<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $notifications = auth()->user()->unreadNotifications;

        // Limpiar notificaiones
        auth()->user()->unreadNotifications->markAsRead();

        return view('notifications/index', [
            'notifications' => $notifications
        ]);
    }
}
