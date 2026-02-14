<?php

namespace App\Notifications;

use App\Models\Trade;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TradeClosedNotification extends Notification
{
    use Queueable;

    public $trade;

    public function __construct(Trade $trade)
    {
        $this->trade = $trade;
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'database']; // email + dashboard notifications
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Trade Closed Notification')
            ->greeting('Hello ' . $notifiable->name)
            ->line('Your trade on ' . $this->trade->asset_name . ' has been closed.')
            ->line('Result: ' . $this->trade->result)
            ->line('Profit/Loss: $' . number_format($this->trade->profit_loss, 2))
            ->line('Thank you for trading with us!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'asset' => $this->trade->asset_name,
            'result' => $this->trade->result,
            'profit_loss' => $this->trade->profit_loss,
        ];
    }
}
