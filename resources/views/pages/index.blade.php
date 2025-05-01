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
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div class="bg-blue-50 p-4 rounded-lg shadow-md">
              <div class="text-gray-500 text-sm">Total Laporan</div>
              <div class="text-2xl font-bold">{{ $total }}</div>
            </div>
            <div class="bg-blue-50 p-4 rounded-lg shadow-md">
              <div class="text-gray-500 text-sm">Laporan Hari Ini</div>
              <div class="text-2xl font-bold">{{ $masukHariIni }}</div>
            </div>
            <div class="bg-blue-50 p-4 rounded-lg shadow-md">
              <div class="text-gray-500 text-sm">Laporan Minggu Ini</div>
              <div class="text-2xl font-bold">{{ $masukMingguIni }}</div>
            </div>
            <div class="bg-blue-50 p-4 rounded-lg shadow-md">
              <div class="text-gray-500 text-sm">Laporan Bulan Ini</div>
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
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <div class="bg-green-50 p-4 rounded-lg shadow-md">
              <div class="text-gray-500 text-sm">Pengaduan</div>
              <div class="text-2xl font-bold">{{ $perJenis['Pengaduan'] ?? 0 }}</div>
            </div>
            <div class="bg-yellow-50 p-4 rounded-lg shadow-md">
              <div class="text-gray-500 text-sm">Aspirasi</div>
              <div class="text-2xl font-bold">{{ $perJenis['Aspirasi'] ?? 0 }}</div>
            </div>
            <div class="bg-purple-50 p-4 rounded-lg shadow-md">
              <div class="text-gray-500 text-sm">Permintaan Informasi</div>
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
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($perStatus as $status => $jumlah)
              <div class="bg-blue-50 p-4 rounded-lg shadow-md">
                <div class="text-gray-500 text-sm">{{ $status }}</div>
                <div class="text-2xl font-bold">{{ $jumlah }}</div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <!-- Daftar Laporan -->
    <div class="col-span-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Daftar Laporan</h4>
          <p class="text-base text-default-500 mt-1">Berikut adalah laporan yang masuk</p>
        </div>
        <div class="card-body">
          <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse">
              <thead class="bg-default-100 border-b border-default-200">
                <tr>
                  <th class="px-4 py-2 text-left">Nama Pelapor</th>
                  <th class="px-4 py-2 text-left">Jenis Laporan</th>
                  <th class="px-4 py-2 text-left">Judul</th>
                  <th class="px-4 py-2 text-left">Tanggal Laporan</th>
                  <th class="px-4 py-2 text-left">Status</th>
                  <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-default-200">
                @foreach ($laporans as $laporan)
                  <tr class="hover:bg-default-50">
                    <td class="px-4 py-2">{{ $laporan['nama_pelapor'] }}</td>
                    <td class="px-4 py-2">{{ $laporan['jenis_laporan'] }}</td>
                    <td class="px-4 py-2">{{ $laporan['judul'] }}</td>
                    <td class="px-4 py-2">{{ $laporan['tanggal_laporan'] }}</td>
                    <td class="px-4 py-2">{{ $laporan['status'] }}</td>
                    <td class="px-4 py-2 relative">
                      <div class="relative inline-block text-left">
                        <form method="POST" action="{{ route('laporan.updateStatus', $laporan['id']) }}">
                          @csrf
                          @method('PATCH')
                          <button type="button"
                            onclick="document.getElementById('dropdown-{{ $loop->index }}').classList.toggle('hidden')"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-1 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                            Ubah Status
                            <svg class="-mr-1 ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.25 8.27a.75.75 0 01-.02-1.06z"
                                clip-rule="evenodd" />
                            </svg>
                          </button>

                          <div id="dropdown-{{ $loop->index }}"
                            class="hidden origin-top-right absolute z-10 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1 text-sm">
                              <button type="submit" name="status" value="Baru"
                                class="block w-full text-left px-4 py-2 bg-green-100 hover:bg-green-200 text-gray-800">Baru</button>
                              <button type="submit" name="status" value="Dalam Proses"
                                class="block w-full text-left px-4 py-2 bg-blue-300 hover:bg-blue-400 text-gray-800">Dalam
                                Proses</button>
                              <button type="submit" name="status" value="Selesai"
                                class="block w-full text-left px-4 py-2 bg-red-100 hover:bg-red-200 text-gray-800">Selesai</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </td>

                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


    <!-- JavaScript Toggle -->
    <script>
      function toggleSelect(id) {
        const form = document.getElementById('form-' + id);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
      }
    </script>

  </div>
@endsection
