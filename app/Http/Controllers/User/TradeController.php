<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trade;
use App\Models\Settings;
use App\Models\Tp_Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\TradeExecutedMail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\TradeClosedNotification;

class TradeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'asset_type' => 'required|in:crypto,forex,stock',
            'asset_name' => 'required|string|max:50',
            'leverage' => 'required|min:1|max:100',
            'duration' => 'required|integer|min:1',
            'amount' => 'required|numeric|min:1',
            'action' => 'required|in:buy,sell',
        ]);





$user=User::where('id',Auth::user()->id)->first();
$amount =  $request->amount;
$string = $request->leverage;

// Separate number and letter
$leverage = intval($string); // 50 (converts leading digits to integer)
if($user->account_bal < $amount){
    //redirect to make deposit
    return redirect()->route('deposits')
  ->with('message', 'Your account is insufficient to purchase this trade. Please make a deposit.');

}

//debit user
User::where('id', $user->id)
->update([
    'account_bal'=>$user->account_bal-$amount,
]);


      $trade =  Trade::create([
            'user_id' => Auth::id(),
            'asset_type' => $request->asset_type,
            'asset_name' => $request->asset_name,
            'leverage' => $leverage ,
            'duration' => $request->duration,
            'amount' => $request->amount,
            'action' => $request->action,
            'take_profit'=> $request->take_profit,
            'stop_loss' => $request->stop_loss,
            'expires_at' => now()->addMinutes($request->duration),
            'status' => 'open'
        ]);

        $settings = Settings::where('id',1)->first();
        if($settings->trade_message=="on"){
         Mail::to($user->email)->send(new TradeExecutedMail($trade, $user, 'Trade Executed'));
    }
         return redirect()->route('user.trades.history')->with('success', 'Trade executed successfully.Your trade has been placed successfully. You can review the details in your trade history.');

    }


    public function  trade()
{

    $settings = Settings::where('id', 1)->first();
    $userId = Auth::id();  // Get currently logged-in user ID

        // Fetch all trades for the logged-in user
        $tradesopen = Trade::where('user_id', $userId)->where('status','open')->orderBy('created_at', 'desc')->paginate(15);
        $tradesclosed = Trade::where('user_id', $userId)->where('status','closed')->orderBy('created_at', 'desc')->paginate(15);
        return view("user.trades.trade")
        ->with(array(
            'title' => 'Trade Center',
            'settings'=>$settings,
            'tradesopen'=> $tradesopen,
            'tradesclosed'=> $tradesclosed,
        ));
}


public function history()
{
    $trades = Trade::where('user_id', Auth()->id())->orderBy('created_at', 'desc')->get();
    $title = 'Trades History';
    if (request()->ajax()) {
        return view('user.trades.partials.history_table', compact('trades','title'))->render();
    }

    return view('user.trades.history', compact('trades','title'));
}


public function processTrade(Request $request)
{
    $trade = Trade::where('id', $request->trade_id)
                  ->where('status', 'open')
                  ->first();

    if (!$trade) {
        return response()->json(['success' => false, 'message' => 'Trade not found or already closed.']);
    }

    $user = User::find($trade->user_id);
    if (!$user) {
        return response()->json(['success' => false, 'message' => 'User not found.']);
    }

    $profit = 0;
    $loss = 0;
    $transactionType = 'LOSE';

    // Determine if trade is a WIN or LOSS based on user's win rate
    $winChance = random_int(1, 100);
    if ($winChance <= $user->win_rate) {
        $profit = $trade->leverage * $trade->amount * 0.01;
        $user->roi += $profit;
        $user->account_bal += ($trade->amount + $profit);
        $transactionType = 'WIN';
    } else {
        $loss = (100 - $trade->leverage) * $trade->amount * 0.01;
        $user->account_bal += $loss;
        $transactionType = 'LOSS';
    }

    // Update trade status & result
    $trade->update([
        'status' => 'closed',
        'profit_loss' => $transactionType === 'WIN' ? $profit : -$trade->amount,
        'result' => $transactionType,
    ]);

    // Record transaction
    Tp_Transaction::create([
        'user' => $user->id,
        'plan' => $trade->asset_name,
        'amount' => $transactionType === 'WIN' ? $profit : -$trade->amount,
        'type' => $transactionType,
        'leverage' => $trade->leverage,
    ]);

    $user->save();

    return response()->json([
        'success' => true,
        'trade_id' => $trade->id,
        'result' => $trade->result,
        'profit_loss' => $trade->profit_loss,
    ]);
}




}


