<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Report;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Layanan Aspirasi dan Pengaduan Online Desa Sadang',
        ];
        return view('index', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori' => 'required',
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'judul' => 'required|string',
            'laporan' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string',
            'lampiran' => 'nullable|file|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        $validatedData['status'] = 'Baru';

        $telepon = preg_replace('/[^0-9+]/', '', $validatedData['telepon']);

        if (substr($telepon, 0, 3) === '+62') {
            $telepon = '62' . substr($telepon, 3);
        }
        if (substr($telepon, 0, 1) === '0') {
            $telepon = '62' . substr($telepon, 1);
        }
        $telepon = preg_replace('/[^0-9]/', '', $telepon);
        $validatedData['telepon'] = $telepon;


        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('lampirans', $filename, 'public');
            $validatedData['lampiran'] = $filename;
        }

        $notif = Notification::create([
            'name' => $validatedData['nama'],
            'message' => 'Laporan baru dari ' . '<strong>' . $validatedData['nama'] . '</strong>' . ': ' . $validatedData['judul'],
        ]);

        $validatedData['notification_id'] = $notif->id;

        Report::create($validatedData);
        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }
}
