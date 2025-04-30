<?php

namespace App\Http\Controllers;

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
            'judul' => 'required|string',
            'laporan' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string',
            'lampiran' => 'required|file|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('lampirans', $filename, 'public');
            $validatedData['lampiran'] = 'storage/lampirans/' . $filename;
        }


        Report::create($validatedData);
        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }
}
