<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = [
            [
                'id' => 1,
                'nama_pelapor' => 'Andi Setiawan',
                'jenis_laporan' => 'Kecelakaan',
                'judul' => 'Tabrakan di Jalan Raya',
                'tanggal_laporan' => '2025-05-01',
                'status' => 'Baru',
            ],
            [
                'id' => 2,
                'nama_pelapor' => 'Rina Marlina',
                'jenis_laporan' => 'Kebakaran',
                'judul' => 'Kebakaran Rumah di Komplek',
                'tanggal_laporan' => '2025-04-30',
                'status' => 'Dalam Proses',
            ],
            [
                'id' => 3,
                'nama_pelapor' => 'Dedi Kusnadi',
                'jenis_laporan' => 'Pencurian',
                'judul' => 'Motor Hilang di Parkiran',
                'tanggal_laporan' => '2025-04-28',
                'status' => 'Selesai',
            ],
        ];
    
        // Statistik
        $total = count($laporans);
        $today = now()->toDateString();
        $thisWeek = now()->startOfWeek();
        $thisMonth = now()->startOfMonth();
    
        $masukHariIni = collect($laporans)->where('tanggal_laporan', $today)->count();
        $masukMingguIni = collect($laporans)->where('tanggal_laporan', '>=', $thisWeek)->count();
        $masukBulanIni = collect($laporans)->where('tanggal_laporan', '>=', $thisMonth)->count();
    
        $perJenis = collect($laporans)->groupBy('jenis_laporan')->map->count();
        $perStatus = collect($laporans)->groupBy('status')->map->count();
    
        return view('pages.index', compact(
            'laporans',
            'total',
            'masukHariIni',
            'masukMingguIni',
            'masukBulanIni',
            'perJenis',
            'perStatus'
        ));
    }
    
    
}
