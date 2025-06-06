<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Notifications\DatabaseNotification;
use Inertia\Inertia;

class NotificationController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Notification/Index', [
            'notifications' => fn () => DatabaseNotification::all(),
        ]);
    }

    public function show($id)
    {
        return Inertia::render('Dashboard/Notification/Show', [
            'notification' => fn () => DatabaseNotification::findOrFail($id),
        ]);
    }
}
