<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CryptoAccount;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\Plans;
use App\Models\Trade;
use App\Models\User_plans;
use App\Models\Mt4Details;
use App\Models\Deposit;
use App\Models\SettingsCont;
use App\Models\Wdmethod;
use App\Models\Withdrawal;
use App\Models\Tp_Transaction;
use App\Traits\PingServer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ViewsController extends Controller
{
    use PingServer;

    public function dashboard(Request $request)
    {

        $settings = Settings::where('id', '1')->first();
        $user = User::find(auth()->user()->id);

        //check if user does not have ref link then update his link
        if ($user->ref_link == '') {
            User::where('id', $user->id)
                ->update([
                    'ref_link' => $settings->site_address . '/ref/' . $user->username,
                ]);
        }

        //give reg bonus if new
        if ($user->signup_bonus != "received" && ($settings->signup_bonus != NULL && $settings->signup_bonus > 0)) {
            User::where('id', $user->id)
                ->update([
                    'bonus' => $user->bonus + $settings->signup_bonus,
                    'account_bal' => $user->account_bal + $settings->signup_bonus,
                    'signup_bonus' => "received",
                ]);
            //create history
            Tp_Transaction::create([
                'user' => Auth::user()->id,
                'plan' => "SignUp Bonus",
                'amount' => $settings->signup_bonus,
                'type' => "Bonus",
            ]);
        }

        if (DB::table('crypto_accounts')->where('user_id', Auth::user()->id)->doesntExist()) {
            $cryptoaccnt = new CryptoAccount();
            $cryptoaccnt->user_id = Auth::user()->id;
            $cryptoaccnt->save();
        }

        //sum total deposited
        $total_deposited = DB::table('deposits')->where('user', $user->id)->where('status', 'Processed')->sum('amount');

        $total_withdrawal = DB::table('withdrawals')->where('user', $user->id)->where('status', 'Processed')->sum('amount');

        //log user out if not blocked by admin
        if ($user->status != "active") {
            $request->session()->flush();
            return redirect()->route('dashboard');
        }

        //tradings stats start
        $totalTrades = Trade::where('user_id', $user->id)->count();
        $openTrades = Trade::where('user_id', $user->id)->where('status', 'open')->count();
        $closedTrades = Trade::where('user_id', $user->id)->where('status', 'closed')->count();

        $totalProfit = Trade::where('user_id', $user->id)->where('profit_loss', '>', 0)->sum('profit_loss');
        $totalLoss = Trade::where('user_id', $user->id)->where('profit_loss', '<', 0)->sum('profit_loss');
        $averageProfitLoss = Trade::where('user_id', $user)->where('status', 'closed')->avg('profit_loss');

        // Win/Loss Count
        $wins = Trade::where('user_id', $user->id)->where('result', 'WIN')->count();
        $losses = Trade::where('user_id', $user->id)->where('result', 'LOSS')->count();
        $winLossRatio = $losses > 0 ? round($wins / $losses, 2) : ($wins > 0 ? $wins : 0);

        //trading stats ends
        return view("user.dashboard", [
            'title' => 'Account Dashboard',
            'deposited' => $total_deposited,
            'total_withdrawal' => $total_withdrawal,
            'trading_accounts' => Mt4Details::where('client_id', Auth::user()->id)->count(),
            'plans' => User_plans::where('user', Auth::user()->id)->where('active', 'yes')->orderByDesc('id')->skip(0)->take(2)->get(),
            't_history' => Tp_Transaction::where('user', Auth::user()->id)
                ->where('type', '<>', 'ROI')
                ->orderByDesc('id')->skip(0)->take(10)
                ->get(),
                'totalTrades'=> $totalTrades,
                'openTrades'=>$openTrades,
                'closedTrades'=>$closedTrades,
                'totalProfit'=>$totalProfit,
                'totalLoss'=> $totalLoss,
                'averageProfitLoss' =>$totalLoss,
                'winLossRatio'=>  $winLossRatio

        ]);
    }

    //Profile route
    public function profile()
    {
        $userinfo = User::where('id', Auth::user()->id)->first();

        $paymethods = Wdmethod::select(['status', 'name'])->where(function ($query) {
            $query->where('type', '=', 'withdrawal')
                ->orWhere('type', '=', 'both');
        })->whereIn('name', ['Bitcoin', 'Ethereum', 'Litecoin', 'Bank Transfer', 'USDT'])->get();

        return view("user.profile")->with(array(
            'userinfo' => $userinfo,
            'methods' => $paymethods,
            'title' => 'Profile',
        ));
    }

    //return add withdrawal account form view
    public function accountdetails()
    {
        return view("user.updateacct")->with(array(
            'title' => 'Update account details',
        ));
    }


    //support route
    public function support()
    {
        return view("user.support")
            ->with(array(
                'title' => 'Support',
            ));
    }




    //news route
    public function news()
    {

        $settings = Settings::where('id', 1)->first();
        return view("user.news")
            ->with(array(
                'title' => 'News',
                'settings'=>$settings,
            ));
    }






    // technical route
    public function  technical()
    {

        $settings = Settings::where('id', 1)->first();
        return view("user.techincal")
            ->with(array(
                'title' => 'Techincal',
                'settings'=>$settings,
            ));
    }




    // chart route
    public function  chart()
    {

        $settings = Settings::where('id', 1)->first();
        return view("user.chart")
            ->with(array(
                'title' => 'Chart',
                'settings'=>$settings,
            ));
    }



    // calender route
    public function  calendar()
    {

        $settings = Settings::where('id', 1)->first();
        return view("user.chart")
            ->with(array(
                'title' => 'Chart',
                'settings'=>$settings,
            ));
    }





    //Trading history route
    public function tradinghistory()
    {
        return view("user.thistory")
            ->with(array(
't_history' => Tp_Transaction::where('user', Auth::user()->id)
    ->whereIn('type', ['ROI', 'WIN', 'LOSE'])
    ->orderByDesc('id')
    ->paginate(15),
'title' => 'Trading History',
            ));
    }

    //Account transactions history route
    public function accounthistory()
    {
        return view("user.transactions")
            ->with(array(
                't_history' => Tp_Transaction::where('user', Auth::user()->id)
                    ->where('type', '<>', 'ROI')
                    ->orderByDesc('id')
                    ->get(),

                'withdrawals' => Withdrawal::where('user', Auth::user()->id)->where('verification', '!=', 'Uncompleted')->orderBy('id', 'desc')
                    ->get(),
                'deposits' => Deposit::where('user', Auth::user()->id)->orderBy('id', 'desc')
                    ->get(),
                'title' => 'Account Transactions History',

            ));
    }

    //Return deposit route
    public function deposits()
    {

        $this->profitreturn(auth()->user()->id);
       $paymethod = Wdmethod::where(function ($query) {
        $query->where('type', 'deposit')
              ->orWhere('type', 'both');
    })
    ->where('status', 'enabled')
    ->orderBy('id', 'asc') // Correct way to order in ascending order
    ->get();


        //sum total deposited
        $total_deposited = DB::table('deposits')->where('user', auth()->user()->id)->where('status', 'Processed')->sum('amount');

        return view("user.deposits")
            ->with(array(
                'title' => 'Fund your account',
                'dmethods' => $paymethod,
                'deposits' => Deposit::where(['user' => Auth::user()->id])
                    ->orderBy('id', 'desc')
                    ->get(),
                'deposited' => $total_deposited,
            ));
    }

    //Return withdrawals route
    public function withdrawals()
    {
        $withdrawals =  Wdmethod::where(function ($query) {
            $query->where('type', '=', 'withdrawal')
                ->orWhere('type', '=', 'both');
        })->where('status', 'enabled')->orderByDesc('id')->get();

        return view("user.withdrawals")
            ->with(array(
                'title' => 'Withdraw Your funds',
                'wmethods' => $withdrawals,
            ));
    }

    public function transferview()
    {
        $settings = SettingsCont::find(1);
        if (!$settings->use_transfer) {
            abort(404);
        }
        return view("user.transfer", [
            'title' => 'Send funds to a friend',
        ]);
    }

    //Subscription Trading
    public function subtrade()
    {
        $settings = Settings::where('id', 1)->first();
        $mod = $settings->modules;
        if (!$mod['subscription']) {
            abort(404);
        }
        return view("user.subtrade")
            ->with(array(
                'title' => 'Subscription Trade',
                'subscriptions' => Mt4Details::where('client_id', auth::user()->id)->orderBy('id', 'desc')->get(),
            ));
    }


    //Main Plans route
    public function mplans()
    {
        return view("user.mplans")
            ->with(array(
                'title' => 'Main Plans',
                'plans' => Plans::where('type', 'main')->get(),
                'settings' => Settings::where('id', '1')->first(),
            ));
    }

    //My Plans route
    public function myplans($sort)
    {
        if ($sort == 'All') {
            return view("user.myplans")
                ->with(array(
                    'numOfPlan' => User_plans::where('user', Auth::user()->id)->count(),
                    'title' => 'Your packages',
                    'plans' => User_plans::where('user', Auth::user()->id)->orderByDesc('id')->paginate(10),
                    'settings' => Settings::where('id', '1')->first(),
                ));
        } else {
            return view("user.myplans")
                ->with(array(
                    'numOfPlan' => User_plans::where('user', Auth::user()->id)->count(),
                    'title' => 'Your packages',
                    'plans' => User_plans::where('user', Auth::user()->id)->where('active', $sort)->orderByDesc('id')->paginate(10),
                    'settings' => Settings::where('id', '1')->first(),
                ));
        }
    }


    public function sortPlans($sort)
    {
        return redirect()->route('myplans', ['sort' => $sort]);
    }

    public function planDetails($id)
    {
        $plan = User_plans::find($id);
        return view("user.plandetails", [
            'title' => $plan->dplan->name,
            'plan' => $plan,
            'transactions' => Tp_Transaction::where('type', 'ROI')->where('user_plan_id', $plan->id)->orderByDesc('id')->paginate(10),
        ]);
    }


    function twofa()
    {
        return view("profile.show", [
            'title' => 'Advance Security Settings',
        ]);
    }

    // Referral Page
    public function referuser()
    {
        return view("user.referuser", [
            'title' => 'Refer user',
        ]);
    }

    public function verifyaccount()
    {
        if (Auth::user()->account_verify == 'Verified') {
            abort(404, 'You do not have permission to access this page');
        }
        return view("user.verify", [
            'title' => 'Verify your Account',
        ]);
    }

    public function verificationForm()
    {
        if (Auth::user()->account_verify == 'Verified') {
            abort(404, 'You do not have permission to access this page');
        }
        return view("user.verification", [
            'title' => 'KYC Application'
        ]);
    }



    public function tradeSignals()
    {
        $settings = Settings::where('id', 1)->first();
        $mod = $settings->modules;
        if (!$mod['signal']) {
            abort(404);
        }

        $response = $this->fetctApi('/subscription', [
            'id' => auth()->user()->id
        ]);
        $res = json_decode($response);

        $responseSt = $this->fetctApi('/signal-settings');
        $info = json_decode($responseSt);

        return view("user.signals.subscribe", [
            'title' => 'Trade signals',
            'subscription' => $res->data,
            'set' => $info->data->settings,
        ]);
    }


    public function binanceSuccess()
    {
        return redirect()->route('deposits')->with('success', 'Your Deposit was successful, please wait while it is confirmed. You will receive a notification regarding the status of your deposit.');
    }

    public function binanceError()
    {
        return redirect()->route('deposits')->with('message', 'Something went wrong please try again. Contact our support center if problem persist');
    }





public function profitReturn($userId)
{
    $user = User::findOrFail($userId);

    // Fetch all active trades that have expired
    $expiredTrades = Trade::where('user_id', $userId)
        ->where('status', 'open')
        ->where('expires_at', '<=', now())
        ->get();

    foreach ($expiredTrades as $trade) {

        $profit = 0;
        $loss = 0;

        // Example: Profit calculation based on leverage (you can change this logic)
        if ($user->tradetype == 'Profit') {
            // Assume profit is % of amount based on leverage
            $profit = $trade->leverage * $trade->amount * 0.01;

            // Update user's balances (profit + return of initial amount)
            $user->roi += $profit;
            $user->account_bal += ($trade->amount + $profit);

            $transactionType = 'WIN';
        } else {
            // Loss scenario: user only gets a % of amount back (based on leverage)
            $profit = $trade->leverage * $trade->amount * 0.01;  // technically this is the loss amount
            $loss = (100 - $trade->leverage) * $trade->amount * 0.01;

            $user->account_bal += $loss;

            $transactionType = 'LOSE';
        }

        // Update the trade status to closed
        $trade->update([
            'status' => 'closed',
            'profit_loss' => $transactionType === 'WIN' ? $profit : -$profit,
        ]);

        // Record the transaction
        Tp_Transaction::create([
            'user' => $user->id,
            'plan' => $trade->asset_name,
            'amount' => $profit,
            'type' => $transactionType,
            'leverage' => $trade->leverage,
        ]);

        // Save updated user balance/ROI
        $user->save();
    }
}

}
