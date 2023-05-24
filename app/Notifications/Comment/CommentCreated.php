<?php

namespace App\Notifications\Comment;

use App\App\Notifications\Channels\CustomDatabaseChannel;
// use App\App\Notifications\Channels\DatabaseChannel;
use App\App\Notifications\CustomDatabaseNotification;
use App\Models\Comment;
use Illuminate\Bus\Queueable;

class CommentCreated extends CustomDatabaseNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Comment $comment)
    {
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
            'author' => [
                'id' => $this->comment->author->id,
                'name' => $this->comment->author->name,
            ],
            'comment' => [
                'id' => $this->comment->id,
                'body' => $this->comment->body,
            ],
        ];
    }
}
