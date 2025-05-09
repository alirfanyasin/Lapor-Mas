<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Report;
use Illuminate\Http\Request;

class AdminReportArchiveController extends Controller
{
    public function index()
    {
        $notifCount = Notification::where('is_read', false)->count();
        $notifications = Notification::where('is_read', false)->orderBy('id', 'DESC')->get();
        $reports = Report::where('status', 'selesai')->orderBy('id', 'DESC')->get();

        $data = [
            'title' => 'Arsip Laporan',
            'notifCount'      => $notifCount,
            'notifications'   => $notifications,
            'reports' => $reports,
        ];
        return view('pages.report-archive', $data);
    }
}
