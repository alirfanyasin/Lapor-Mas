@extends('layouts.template')
@section('content')
  <div class="grid grid-cols-12 gap-6">
    <!-- Statistik Utama dalam Bentuk Kartu -->
    <div class="col-span-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Statistik Laporan</h4>
        </div>
        <div class="card-body">
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <div class="p-4 rounded-lg shadow-md bg-blue-50">
              <div class="text-sm text-gray-500">Total Laporan</div>
              <div class="text-2xl font-bold">{{ $total }}</div>
            </div>
            <div class="p-4 rounded-lg shadow-md bg-blue-50">
              <div class="text-sm text-gray-500">Laporan Hari Ini</div>
              <div class="text-2xl font-bold">{{ $masukHariIni }}</div>
            </div>
            <div class="p-4 rounded-lg shadow-md bg-blue-50">
              <div class="text-sm text-gray-500">Laporan Minggu Ini</div>
              <div class="text-2xl font-bold">{{ $masukMingguIni }}</div>
            </div>
            <div class="p-4 rounded-lg shadow-md bg-blue-50">
              <div class="text-sm text-gray-500">Laporan Bulan Ini</div>
              <div class="text-2xl font-bold">{{ $masukBulanIni }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Laporan Berdasarkan Klasifikasi dalam Bentuk Kartu -->
    <div class="col-span-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Laporan Berdasarkan Klasifikasi</h4>
        </div>
        <div class="card-body">
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
            <div class="p-4 rounded-lg shadow-md bg-green-50">
              <div class="text-sm text-gray-500">Pengaduan</div>
              <div class="text-2xl font-bold">{{ $perJenis['Pengaduan'] ?? 0 }}</div>
            </div>
            <div class="p-4 rounded-lg shadow-md bg-yellow-50">
              <div class="text-sm text-gray-500">Aspirasi</div>
              <div class="text-2xl font-bold">{{ $perJenis['Aspirasi'] ?? 0 }}</div>
            </div>
            <div class="p-4 rounded-lg shadow-md bg-purple-50">
              <div class="text-sm text-gray-500">Permintaan Informasi</div>
              <div class="text-2xl font-bold">{{ $perJenis['Permintaan Informasi'] ?? 0 }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Laporan Berdasarkan Status dalam Bentuk Kartu -->
    <div class="col-span-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Laporan Berdasarkan Status</h4>
        </div>
        <div class="card-body">
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($perStatus as $status => $jumlah)
              <div class="p-4 rounded-lg shadow-md bg-blue-50">
                <div class="text-sm text-gray-500">{{ $status }}</div>
                <div class="text-2xl font-bold">{{ $jumlah }}</div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
