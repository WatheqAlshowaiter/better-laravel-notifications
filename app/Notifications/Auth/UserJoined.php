<?php

namespace App\Notifications\Auth;

use App\App\Notifications\Channels\CustomDatabaseChannel;
use App\App\Notifications\CustomDatabaseNotification;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class UserJoined extends CustomDatabaseNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public User $user)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [
            CustomDatabaseChannel::class,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'user' => [
                'id' => $this->user->id,
            ],
        ];
    }
}
