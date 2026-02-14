<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\Wdmethod;
use App\Models\Withdrawal;
use App\Mail\WithdrawalStatus;
use App\Mail\NewNotification;
use App\Traits\PingServer;
use Illuminate\Support\Facades\Mail;

class ManageWithdrawalController extends Controller
{
    use PingServer;

    //process withdrawals
    public function pwithdrawal(Request $request)
    {
        $withdrawal=Withdrawal::where('id',$request->id)->first();
        $user=User::where('id',$withdrawal->user)->first();
         $settings=Settings::where('id', '=', '1')->first();


        if ($request->action == "Paid") {
            Withdrawal::where('id',$request->id)
            ->update([
                'status' => 'Processed',
            ]);
            
            //settings



//deduting user balance   if its on admin Admin Aprove          
        if ($settings->deduction_option == "AdminApprove") {
            //debit user
            User::where('id', $user->id)->update([
                'account_bal' => $user->account_bal -  $withdrawal->to_deduct,
                'withdrawotp' => NULL,
            ]);
        }

  
         //sending mail to user  
            
      $withdrawal=Withdrawal::where('id',$request->id)->first();
            
                 //send notification to user
     Mail::to($user->email)->send(new WithdrawalStatus( $withdrawal, $user, 'Withdrawal Approved'));
     
        }else {

            if($withdrawal->user==$user->id){
                
                 if ($settings->deduction_option == "userRequest") {
                User::where('id',$user->id)
                ->update([
                    'account_bal' => $user->account_bal+$withdrawal->to_deduct,
                ]);
                 }
                // Withdrawal::where('id',$request->id)->delete();

                 Withdrawal::where('id',$request->id)
            ->update([
                'status' => 'Rejected',
            ]);
                if ($request->emailsend == "true") {
                    Mail::to($user->email)->send(new NewNotification($request->reason,$request->subject, $user->name));
                }

              }

        }

        return redirect()->route('mwithdrawals')->with('success', 'Action Sucessful!');
    }


    public function processwithdraw($id){
         $with = Withdrawal::where('id',$id)->first();
         $method = Wdmethod::where('name', $with->payment_mode)->first();
         $user = User::where('id', $with->user)->first();
        return view('admin.Withdrawals.pwithrdawal',[
            'withdrawal' => $with,
            'method' => $method,
            'user' => $user,
            'title'=>'Process withdrawal Request',
        ]);
    }
}
