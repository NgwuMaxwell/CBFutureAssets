<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trade;
use App\Models\User;
use App\Mail\TradeUpdateMail;
use App\Mail\AdminPlacedTradeMail;
use Illuminate\Support\Facades\Mail;
use App\Notifications\TradeClosedNotification;
use Illuminate\Http\Request;

class ManageTradeController extends Controller
{
    // Fetch and list all trades (open and closed) with pagination
    public function index()
    
  
    {
        $trades = Trade::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
            $title = 'Manage Users Trades';
        return view('admin.trades.index', compact('trades','title'));
    }

    // Show details for a single trade
    public function show($id)
    {
        $trade = Trade::with('user')->findOrFail($id);
        $title = 'Edit users Trades';
        return view('admin.trades.show', compact('trade','title'));
    }

    // Optionally, if you want to allow the admin to assign profit/loss manually (optional feature)
    public function updateProfitLoss(Request $request, $id)
    {
        $request->validate([
            'profit_loss' => 'required|numeric',
        ]);

        $trade = Trade::findOrFail($id);
       
        
        $profit_loss = $request->profit_loss;

        if($request->result=='WIN'){
            $profit_loss   =  $profit_loss;
        }else{
            $profit_loss   = -abs(floatval( $profit_loss));
        }
        $trade->update([
            'profit_loss' =>  $profit_loss ,
            'result' => $request->result,
            'status' => 'closed',
        ]);
        $user = User::where('id', $trade->user_id)->first();




        if($request->result=='WIN'){

            $user_bal=$user->account_bal;
            $user_roi=$user->roi;
            $amount = $trade->amount +$request->profit_loss;
            User::where('id', $trade->user_id )
                  ->update([

                    'account_bal'=> $user_bal + $amount,
                    'roi'=> $user->roi + $request->profit_loss,
                  ]);

                }else{


                    $user_bal=$user->account_bal;
                    $user_roi=$user->roi;
                    $amount = $trade->amount -$request->profit_loss;
            User::where('id', $trade->user_id)
            ->update([

              'account_bal'=>$user->account_bal+ $amount,
            ]);
        }

        if ($request->status === 'closed') {
            $trade->user->notify(new TradeClosedNotification($trade));
        }
        $subject = 'Trade Update Notification';
        Mail::to($user->email)->send(new TradeUpdateMail($trade,$user,$subject));
        return redirect()->back()->with('success', 'Profit/Loss updated successfully.');
    }


    public function create()
    {
        $users = User::where('id', '!=', 192)->get();
        $recentUsers = User::latest()->limit(10)->get();
        $title = 'Create trades for Users';
        return view('admin.trades.create', compact('users','title', 'recentUsers'));
    }

    // Store trade placed by admin for a user
    public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'asset_type' => 'required|string',
        'asset_name' =>'required|string',
        'amount' => 'required|numeric|min:1',
        'leverage' => 'required|min:1',
        'duration' => 'required|integer|min:1', // Duration now directly in minutes
        'action' => 'required|in:BUY,SELL',
    ]);

    $string = $request->leverage;

// Separate number and letter
$leverage = intval($string);

  $trade =  Trade::create([
        'user_id' => $request->user_id,
        'asset_type' => $request->asset_type, // You might want to set a proper type here, like 'admin_manual'
        'asset_name' => $request->asset_name,
        'amount' => $request->amount,
        'leverage' => $leverage,
        'duration' => $request->duration, // Save the minutes directly
        'action' => $request->action,
        'status' => 'open',
        'take_profit'=> $request->take_profit,
        'stop_loss' => $request->stop_loss,
        'profit_loss' => 0.00, // Default to 0 until admin assigns
        'expires_at' => now()->addMinutes($request->duration), // Directly using minutes
    ]);

    $user = User::where('id', $request->user_id)->first();

    $user_bal=$user->account_bal;
    User::where('id',  $request->user_id)
    ->update([

      'account_bal'=>$user->account_bal- $request->amount,
    ]);

    $subject = 'New Trade Placed for You';
    Mail::to($user->email)->send(new AdminPlacedTradeMail($trade,$user,$subject));
    return redirect()->route('admin.trades.index')->with('success', 'Trade created successfully!');
}

//search for users
    public function search(Request $request)
    {
        $search = $request->get('q');

        $users = User::where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->limit(10)
                    ->get();

        $results = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'text' => "{$user->name} ({$user->email})",
            ];
        });

        return response()->json($results);
    }

//show edit trades

public function edit(Trade $trade)
{
    $users = User::all(); // In case you want to allow changing the user who owns the trade
   $title = "Update User Trades";
    return view('admin.trades.edit', compact('trade', 'users','title'));
}
//update edit trades

public function update(Request $request, Trade $trade)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'asset_type' => 'required|string',
        'asset_name' => 'required|string',
        'action' => 'required|in:buy,sell',
        'amount' => 'required|numeric|min:0',
        'leverage' => 'required|integer|min:1',
        'duration' => 'required|integer|min:1',
        'status' => 'required|in:open,closed',
        'profit_loss' => 'nullable|numeric',
        'result' => 'required|in:PENDING,WIN,LOSS', // ✅ Add validation for result
    ]);

    $trade->update([
        'user_id' => $request->user_id,
        'asset_type' => $request->asset_type,
        'asset_name' => $request->asset_name,
        'action' => $request->action,
        'amount' => $request->amount,
        'leverage' => $request->leverage,
        'duration' => $request->duration,
        'expires_at' => now()->addMinutes($request->duration),
        'status' => $request->status,
        'profit_loss' => $request->profit_loss,
        'result' => $request->result, // ✅ Store the result (WIN/LOSS)
    ]);

    return redirect()->route('admin.trades.index')->with('success', 'Trade updated successfully!');
}


}
