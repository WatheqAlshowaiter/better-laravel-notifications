<?php

namespace App\App\Notifications\Channels;

use App\App\Notifications\CustomDatabaseNotification;
use ReflectionClass;

class CustomDatabaseChannel
{
    public function send($notifiable, CustomDatabaseNotification $notification)
    {
        return $notifiable->routeNotificationFor('database', $notification)->create([
            'id' => $notification->id,
            'type' => $this->getType($notification),
            'type_class' => get_class($notification),
            'data' => $notification->toArray($notifiable),
            'models' => json_encode($notification->models()),
            'read_at' => null,
        ]);
    }

    public function getType(CustomDatabaseNotification $notification)
    {
        return (new ReflectionClass($notification))->getShortName();
    }
}
