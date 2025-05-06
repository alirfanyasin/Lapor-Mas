<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Report;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index()
    {
        $notifCount = Notification::where('is_read', false)->count();
        $notifications = Notification::where('is_read', false)->orderBy('id', 'DESC')->get();
        $reports = Report::all();

        $data = [
            'title' => 'Laporan',
            'notifCount'      => $notifCount,
            'notifications'   => $notifications,
            'reports' => $reports,
        ];
        return view('pages.reports', $data);
    }

    public function show($id)
    {
        $notifCount = Notification::where('is_read', false)->count();
        $notifications = Notification::where('is_read', false)->orderBy('id', 'DESC')->get();
        $laporan = Report::findOrFail($id);

        $data = [
            'title' => 'Detail Laporan',
            'notifCount'      => $notifCount,
            'notifications'   => $notifications,
            'data' => $laporan,
        ];
        return view('pages.report-detail', $data);
    }

    public function updateStatus(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|string',
        ]);

        $laporan = Report::findOrFail($id);
        $laporan->update($validatedData);

        // Notification::create([
        //     'name' => 'Admin',
        //     'message' => 'Laporan dari ' . '<strong>' . $laporan->nama . '</strong>' . ': ' . $laporan->judul . ' telah diperbarui statusnya menjadi ' . $validatedData['status'],
        // ]);

        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui.');
    }
}
