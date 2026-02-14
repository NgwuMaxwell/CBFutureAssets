<?php

namespace App\Http\Controllers;

use App\Models\CopyTrade;
use App\Models\Expert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CopyTradeController extends Controller
{
    // Show list of available experts to copy
    public function index()
    {
        $user = auth()->user();
        $experts = Expert::all();
        $activeCopies = CopyTrade::where('user_id', $user->id)
        ->where('status', 'active')
        ->with('expert')
        ->get();
        return view('user.copytrading.index', compact('experts', 'activeCopies'));
    }

    // Show a specific expert's details (optional)
    public function show(Expert $expert)
    {
        return view('copytrading.show', compact('expert'));
    }

    // Start copying an expert
    public function startCopying(Request $request, $expertId)
    {
        $user = Auth::user();
        $expert = Expert::findOrFail($expertId);

        $request->validate([
            'invested_amount' => 'required|numeric|min:' . $expert->min_startup_capital,
        ]);

        if ($user->account_bal < $request->invested_amount) {
            return back()->with('message', 'Insufficient balance to copy this expert.');
        }

        // Deduct initial amount from user's balance
        $user->account_bal -= $request->invested_amount;
        $user->save();

        // Create the copy trade record
        CopyTrade::create([
            'user_id' => $user->id,
            'expert_id' => $expert->id,
            'invested_amount' => $request->invested_amount,
            'current_profit' => 0,
            'status' => 'active',
        ]);

        return back()->with('success', 'You have started copying ' . $expert->name);
    }

    // Stop copying an expert
    public function stopCopying($copyTradeId)
    {
        $copyTrade = CopyTrade::findOrFail($copyTradeId);
        $user = Auth::user();

        if ($copyTrade->user_id != $user->id) {
            return back()->with('message', 'Unauthorized action.');
        }

        // Pay the user the final profit (if any) + invested amount
        $user->account_bal += $copyTrade->invested_amount + $copyTrade->current_profit;
        $user->save();

        // Mark trade as stopped
        $copyTrade->update([
            'status' => 'stopped',
        ]);

        return back()->with('success', 'You have stopped copying this expert.');
    }

    // Method to distribute daily profits based on expert win rate
    public function distributeDailyProfits()
    {
        $activeCopyTrades = CopyTrade::where('status', 'active')->get();

        foreach ($activeCopyTrades as $copyTrade) {
            $expert = $copyTrade->expert;
            $user = $copyTrade->user;

            // Simulate daily profit based on expert win rate (example logic)
            $dailyProfit = ($copyTrade->invested_amount * ($expert->win_rate / 100)) / 30;

            // Add profit share to expert's total profit
            $expertProfitShare = ($dailyProfit * ($expert->profit_share_percentage / 100));
            $expert->total_profit += $expertProfitShare;
            $expert->save();

            // Add user profit to their copy trade record (after deducting expert share)
            $userProfit = $dailyProfit - $expertProfitShare;
            $copyTrade->current_profit += $userProfit;
            $copyTrade->save();
        }

        return response()->json(['status' => 'success', 'message' => 'Daily profits distributed.']);
    }
}

