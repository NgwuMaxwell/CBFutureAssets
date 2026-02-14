<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\Plans;
use App\Models\Tp_Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewNotification;
use App\Models\User_plans;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class UserInvPlanController extends Controller
{

    public function joinplan(Request $request){
        //get user
        $user=User::where('id',Auth::user()->id)->first();
        //get plan
        $plan=Plans::where('id',$request['id'])->first();
        
        if(isset($request['iamount']) && $request['iamount']>0){
            $plan_price=$request['iamount'];
        }else{
            $plan_price = $plan->price;
        }

        //check if the user account balance can buy this plan
        if($user->account_bal < $plan_price){
            //redirect to make deposit
            return redirect()->route('deposits')
          ->with('message', 'Your account is insufficient to purchase this plan. Please make a deposit.');
            
        }
      
        $expiration = explode(" ", $plan->expiration);
        $digit = $expiration[0];
        $frame = $expiration[1];
        $toexpire =  "add". $frame;
        $end_at = Carbon::now()->$toexpire($digit)->toDateTimeString();
       // return $end_at;


        //    Credit user the plan bonus
        if($plan->gift > 0){
            
            User::where('id', $user->id)
               ->update([
               'bonus'=>$user->bonus+$plan->gift,
               'account_bal'=>$user->account_bal + $plan->gift,
             ]);
   
            //create history
            Tp_Transaction::create([
                'user' => $user->id,
                'plan' => $plan->name,
                'amount'=>$plan->gift,
                'type'=>"Gift Bonus",
            ]);
        }

        //debit user
        User::where('id', $user->id)
        ->update([
            'account_bal'=>$user->account_bal-$plan_price,
        ]);

        //create history
        Tp_Transaction::create([
            'user' => $user->id,
            'plan' => $plan->name,
            'amount'=>$plan_price,
            'type'=>"Plan purchase",
        ]);

        //save user plan
        $userplanid = DB::table('user_plans')->insertGetId([
            'plan' => $plan->id,
            'user' => Auth::user()->id,
            'amount' => $plan_price,
            'active' => 'yes',
            'inv_duration'=>$request['duration'],
            'expire_date' => $end_at,
            'activated_at' => \Carbon\Carbon::now(),
            'last_growth' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        User::where('id',Auth::user()->id)
        ->update([
          'plan'=>$plan->id,
          'user_plan' => $userplanid,
          'entered_at'=>\Carbon\Carbon::now(),
        ]);

        //send notification
        $settings=Settings::where('id', '=', '1')->first();
        $message = "This is to inform you that $user->name just purchased an investment plan: $plan->name";
        $subject ="$user->name just purchased an investment plan";
        Mail::to($settings->contact_email)->send(new NewNotification($message, $subject, 'Admin'));

        return redirect()->back()
          ->with('success', "You have successfully purchased a plan and $plan->name your  $plan->name plan is now active.");
    }
 


    public function cancelPlan($plan)
    {
        $plan = User_plans::find($plan);
        $plan->active = 'cancelled';
        $plan->save();

        // credit the user his capital
        User::where('id', $plan->user)
            ->update([
                'account_bal' => Auth::user()->account_bal + $plan->amount,
            ]);

        //save to transactions history
        $th = new Tp_transaction();
        $th->plan = $plan->dplan->name;
        $th->user = $plan->user;
        $th->amount = $plan->amount;
        $th->type = "Investment capital for cancelled plan";
        $th->save();

        // Send a mail to the user informing them of their plan cancellation
        $planName = $plan->dplan->name;
        $message = "You have succesfully cancelled your $planName plan and your investment capital have been credited to your account,  If this is a mistake, please contact us immediately to reactivate it for you.";
        Mail::to(Auth::user()->email)->send(new NewNotification($message, 'Invsetment Plan Cancelled', Auth::user()->name));

        return back()->with('success', 'Plan cancelled successfully');
    }
}