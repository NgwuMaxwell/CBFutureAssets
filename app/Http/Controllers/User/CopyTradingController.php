<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Expert;
use App\Models\Copy;
use Illuminate\Http\Request;

class CopyTradingController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Fetch all experts
        $experts = Expert::all();
        $title = "Copy an Expert";

        // Fetch active copies where the user is currently copying an expert
        $activeCopies = Copy::where('user_id', $user->id)
            ->where('status', 'active')
            ->get();

        return view('user.copy_trading.index', compact('experts', 'activeCopies','title'));
    }

    public function startCopying($expertId)
    {
        $expert = Expert::findOrFail($expertId);
        $user = auth()->user();

        if ($user->account_bal < $expert->minimum_capital) {
            return redirect()->back()->with('message', 'Insufficient balance to copy this expert.');
        }

        Copy::create([
            'user_id' => $user->id,
            'expert_id' => $expert->id,
            'start_date' => now(),
            'status' => 'active',
        ]);

        return redirect()->back()->with('success', 'You have started copying ' . $expert->name);
    }

    public function stopCopying(Expert $expert)
{
    $user = Auth::user();

    $copy = $user->copiedExperts()
        ->where('expert_id', $expert->id)
        ->where('status', 'active')
        ->first();

    if ($copy) {
        $copy->update([
            'status' => 'stopped',
            'end_date' => now(),
        ]);

        return redirect()->back()->with('success', 'You have stopped copying ' . $expert->name);
    }

    return redirect()->back()->with('message', 'You are not copying this expert.');
}

}

