<?php

namespace App\App\Notifications\Models;

use Illuminate\Notifications\DatabaseNotification as BaseNotification;

class DatabaseNotification extends BaseNotification
{
    public function getModelsAttribute($value)
    {
        return (array) json_decode($value);
    }

    public function getDataAttribute($value)
    {
        return json_decode($value);
    }
}
