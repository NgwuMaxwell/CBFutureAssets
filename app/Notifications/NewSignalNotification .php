<?php

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewSignalNotification extends Notification
{
    use Queueable;

    protected $signal;

    public function __construct($signal)
    {
        $this->signal = $signal;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // Send via email & dashboard notification
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Trading Signal Available')
            ->line('A new trading signal has been posted.')
            ->action('View Signal', url('/signals'))
            ->line('Trade wisely!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'A new trading signal has been posted.',
            'signal_id' => $this->signal->id,
        ];
    }
}
