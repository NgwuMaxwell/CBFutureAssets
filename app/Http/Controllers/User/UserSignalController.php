<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SignalPlan;
use App\Models\SignalSubscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserSignalController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:signal_plans,id',
        ]);

        $user = Auth::user();
        $plan = SignalPlan::findOrFail($request->plan_id);

        // Check if user has an active subscription
        if (SignalSubscription::where('user_id', $user->id)->where('signal_plan_id', $plan->id)->exists()) {
            return back()->with('error', 'You are already subscribed to this plan.');
        }

        // Check user balance
        if ($user->account_bal < $plan->price) {
            return back()->with('error', 'Insufficient balance to subscribe.');
        }

        // Deduct amount from balance
        $user->account_bal -= $plan->price;
        $user->save();

        // Store subscription
        SignalSubscription::create([
            'user_id' => $user->id,
            'signal_plan_id' => $plan->id,
            'expires_at' => now()->addMonth(), // Subscription lasts for 1 month
        ]);

        // Send confirmation email (optional)
        // Mail::to($user->email)->send(new \App\Mail\SignalSubscriptionMail($plan));

        return redirect()->route('user.signals')->with('success', 'Subscription successful.');
    }
}
