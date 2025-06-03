<?php

namespace App\Traits;

use Illuminate\Notifications\DatabaseNotification;

trait FetchNotification
{
    public static function notifications()
    {
        return DatabaseNotification::where('type', static::class)->get();
    }

    public static function unreadNotifications()
    {
        return DatabaseNotification::where('type', static::class)->whereNull('is_read')->get();
    }

    public static function readNotifications()
    {
        return DatabaseNotification::where('type', static::class)->whereNotNull('is_read')->get();
    }

    public static function unReadNotificationCount()
    {
        return DatabaseNotification::where('type', static::class)->whereNull('is_read')->count();
    }

    public static function readNotificationCount()
    {
        return DatabaseNotification::where('type', static::class)->whereNotNull('is_read')->count();
    }
}
