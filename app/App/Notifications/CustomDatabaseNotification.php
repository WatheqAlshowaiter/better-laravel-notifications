<?php

namespace App\App\Notifications;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;
use ReflectionClass;

class CustomDatabaseNotification extends Notification
{
    public function models()
    {
        $reflections = new ReflectionClass($this);

        $params = $reflections->getConstructor()->getParameters();

        return array_map(function ($param) {
            $class = $param->getClass();

            if (! $class->isSubClassOf(Model::class)) {
                return;
            }

            return [
                'id' => $this->{$param->name}->id,
                'class' => $class->name,
            ];
        }, $params);
    }
}
