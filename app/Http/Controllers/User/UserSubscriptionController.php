<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\NewNotification;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Signal;
use App\Models\Mt4Details;
use App\Models\Settings;
use App\Models\SignalPlan;
use App\Models\SignalSubscription;
use App\Models\Tp_Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserSubscriptionController extends Controller
{



    public function index()
{
    $user = auth()->user();
    $title = "Signal Subscribed";
    // Check if the user has an active signal subscription
    $activeSubscription = SignalSubscription::where('user_id', $user->id)
        ->where('expires_at', '>', now())
        ->exists();

    if (!$activeSubscription) {
        return redirect()->route('user.signal.plans')->with('message', 'You need an active subscription to view signals.');
    }

    $signals = Signal::latest()->get(); // Fetch all signals
    return view('user.signals.index', compact('signals','title'));
}

    public function showPlans()
    {
        $plans = SignalPlan::all();
        $settings = Settings::where('id',1)->first();
        $title = 'Suscribe Signals';
        return view('user.signals.subscribe', compact('plans','title','settings'));
    }

    // Handle Subscription Logic
    public function subscribe(Request $request)
    {
        $user = Auth::user();
        $plan = SignalPlan::findOrFail($request->plan_id);

        // Check if user has enough balance
        if ($user->account_bal < $plan->price) {
            return back()->with('message', 'Insufficient balance to subscribe.');
        }

        // Deduct balance
        $user->account_bal -= $plan->price;
        $user->save();

        // Store subscription
        SignalSubscription::create([
            'user_id' => $user->id,
            'signal_plan_id' => $plan->id,
            'expires_at' => now()->addDays($plan->duration)
        ]);

        return redirect()->route('user.signal.subscriptions')->with('success', 'Subscription successful!');
    }

    // Show user's active subscriptions
    public function mySubscriptions()
    {
        $title = 'Signals';
        $settings = Settings::where('id',1)->first();
        $subscriptions = SignalSubscription::where('user_id', Auth::id())
            ->with('plan')
            ->get();

        return view('user.signals.subscriptions', compact('subscriptions','title','settings'));
    }

}
