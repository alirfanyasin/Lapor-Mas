<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Report;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notifications()
    {
        $notifCount = Notification::where('is_read', false)->count();
        $notifications = Notification::where('is_read', false)->orderBy('id', 'DESC')->get();

        $data = [
            'title' => 'Notifications',
            'notifCount' => $notifCount,
            'notifications' => $notifications,
        ];
        return view('pages.notifications', $data);
    }


    public function showNotification($id)
    {
        $notifCount = Notification::where('is_read', false)->count();
        $notifications = Notification::where('is_read', false)->orderBy('id', 'DESC')->get();
        $notif = Notification::findOrFail($id);
        $data = Report::where('notification_id', $notif->id)->first();
        $notif->is_read = true;
        $notif->save();

        return view('pages.notification-detail', [
            'title' => 'Notification Detail',
            'notifCount' => $notifCount,
            'notifications' => $notifications,
            'data' => $data
        ]);
    }
}
