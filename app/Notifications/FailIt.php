<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Events\NotificationFailed;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FailIt extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        event(new NotificationFailed($notifiable, $this, 'mail', []));
        return (new MailMessage)->greeting('Hello!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'oh' => 'nooo',
        ];
    }
}
