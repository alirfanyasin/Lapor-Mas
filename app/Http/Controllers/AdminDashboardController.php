<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Report;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $laporans = Report::all();
        $today = now()->toDateString();
        $thisWeek = now()->startOfWeek();
        $thisMonth = now()->startOfMonth();

        $masukHariIni = $laporans->where('tanggal', $today)->count();
        $masukMingguIni = $laporans->where('tanggal', '>=', $thisWeek)->count();
        $masukBulanIni = $laporans->where('tanggal', '>=', $thisMonth)->count();
        $notifCount = Notification::where('is_read', false)->count();
        $notifications = Notification::where('is_read', false)->orderBy('id', 'DESC')->get();

        $data = [
            'title'           => 'Dashboard',
            'laporans'        => $laporans,
            'total'           => $laporans->count(),
            'masukHariIni'    => $masukHariIni,
            'masukMingguIni'  => $masukMingguIni,
            'masukBulanIni'   => $masukBulanIni,
            'perJenis'        => $laporans->groupBy('kategori')->map->count(),
            'perStatus'       => $laporans->groupBy('status')->map->count(),
            'notifCount'      => $notifCount,
            'notifications'   => $notifications
        ];

        return view('pages.index', $data);
    }
}
