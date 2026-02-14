<?php

namespace App\Jobs;

use App\Models\Copy;
use App\Models\Expert;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CalculateCopyTradeProfit

{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Get all active copied trades
        $copies = Copy::where('status', 'active')->get();

        foreach ($copies as $copy) {
            $user = User::find($copy->user_id);
            $expert = Expert::find($copy->expert_id);

            if (!$user || !$expert) {
                continue; // Skip if user or expert is missing
            }

            // Check if the trade is a WIN based on the expert's win rate
            $winChance = $expert->win_rate; // e.g., 70% win rate
            $isWin = rand(1, 100) <= $winChance;

            $profit = 0;

            if ($isWin) {
                // Calculate profit based on profit percentage set by admin
                $profit = ($expert->profit_percentage / 100) * $copy->total_profit;
            }

            // Calculate profit share for expert
            $expertShare = ($expert->profit_share / 100) * $profit;
            $userProfit = $profit - $expertShare;

            // Update user's total profit and balance
            $user->account_bal += $userProfit;
            $user->roi += $userProfit;
            $user->save();

            // Update copy trade profit
            $copy->total_profit += $userProfit;
            $copy->save();

            $expert->total_profit += $expertShare;
            $expert->save();
        }
    }
}
