<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Trade;
use App\Models\Tp_Transaction;

class ProcessExpiredTrades extends Command
{
    protected $signature = 'process:trades';
    protected $description = 'Process all expired trades for all users';

    public function handle()
    {
        $this->info('Processing expired trades for all users...');

        $users = User::all();
        foreach ($users as $user) {
            $this->processUserTrades($user);
        }

        $this->info('All expired trades processed successfully.');
    }

    private function processUserTrades($user)
    {
        $expiredTrades = Trade::where('user_id', $user->id)
            ->where('status', 'open')
            ->where('expires_at', '<=', now())
            ->get();

        foreach ($expiredTrades as $trade) {
            $profit = 0;
            $loss = 0;
            $transactionType = 'LOSE';

            // WIN or LOSS based on user win_rate (randomly decided)
            $winChance = random_int(1, 100);
            if ($winChance <= $user->win_rate) {
                // WIN case
                $profit = $trade->leverage * $trade->amount * 0.01;

                // Update user balances
                $user->roi += $profit;
                $user->account_bal += ($trade->amount + $profit);

                $transactionType = 'WIN';
            } else {
                // LOSS case
                $loss = (100 - $trade->leverage) * $trade->amount * 0.01;

                // Optional: Partial refund (if needed)
                $user->account_bal += $loss;
                $transactionType = 'LOSS';
            }

            // Update trade status & result
            $trade->update([
                'status' => 'closed',
                'profit_loss' => $transactionType === 'WIN' ? $profit : -$trade->amount,
                'result' => $transactionType,
            ]);

            // Record the transaction
            Tp_Transaction::create([
                'user' => $user->id,
                'plan' => $trade->asset_name,
                'amount' => $transactionType === 'WIN' ? $profit : -$trade->amount,
                'type' => $transactionType,
                'leverage' => $trade->leverage,
            ]);

            $user->save();
        }
    }
}
