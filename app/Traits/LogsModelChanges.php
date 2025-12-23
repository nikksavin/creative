<?php

namespace App\Traits;

use App\Models\Log;
use App\Events\LogStarted;
use App\Events\LogFinished;

trait LogsModelChanges
{
    public static function bootLogsModelChanges()
    {
        static::created(function ($model) {
            static::logAction($model, 'created');
        });

        static::updated(function ($model) {
            static::logAction($model, 'updated');
        });

        static::deleted(function ($model) {
            static::logAction($model, 'deleted');
        });

        static::retrieved(function ($model) {
            static::logAction($model, 'retrieved');
        });
    }

    protected static function logAction($model, $event)
    {
        // Событие начала логирования
        event(new LogStarted($model, $event));

        $old = null;
        $new = null;

        if ($event === 'updated') {
            $old = array_intersect_key(
                $model->getOriginal(),
                $model->getDirty()
            );

            $new = $model->getDirty();
        }

        if ($event === 'created') {
            $new = $model->getAttributes();
        }

        if ($event === 'deleted') {
            $old = $model->getOriginal();
        }

        if ($event === 'retrieved') {
            $new = $model->getAttributes();
        }

        $log = Log::create([
            'model' => get_class($model),
            'event' => $event,
            'old'   => $old,
            'new'   => $new,
        ]);

        // Событие окончания логирования
        event(new LogFinished($model, $event, $log));
    }
}
