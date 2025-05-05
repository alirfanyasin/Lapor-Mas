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
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
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
    <!-- Daftar Laporan -->
    <div class="col-span-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Daftar Laporan</h4>
          <p class="mt-1 text-base text-default-500">Berikut adalah laporan yang masuk</p>
        </div>
        <div class="card-body">
          <div class="overflow-x-auto">
            <table class="w-full border-collapse table-auto">
              <thead class="border-b bg-default-100 border-default-200">
                <tr>
                  <th class="px-4 py-2 text-left">Nama Pelapor</th>
                  <th class="px-4 py-2 text-left">Jenis Laporan</th>
                  <th class="px-4 py-2 text-left">Judul</th>
                  <th class="px-4 py-2 text-left">Tanggal Laporan</th>
                  <th class="px-4 py-2 text-left">Status</th>
                  <th class="px-4 py-2 text-left">Aksi</th>
                  <th class="px-4 py-2 text-left">Feedback</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-default-200">
                @foreach ($laporans as $laporan)
                  @php
                    // Siapkan nomor WA dan pesan default
                    $noHp = preg_replace('/\D/', '', $laporan->telepon);
                    $message = "Halo {$laporan->nama}, terima kasih atas laporan Anda. Mohon tunggu, kami akan menindaklanjuti dalam 1×24 jam.";
                    $msgEncoded = urlencode($message);
                  @endphp
                  <tr class="hover:bg-default-50">
                    <td class="px-4 py-2">{{ $laporan->nama }}</td>
                    <td class="px-4 py-2">{{ $laporan->kategori }}</td>
                    <td class="px-4 py-2">{{ $laporan->judul }}</td>
                    <td class="px-4 py-2">{{ $laporan->tanggal }}</td>
                    <td class="px-4 py-2">{{ $laporan->status }}</td>

                    {{-- Kolom Aksi: Ubah Status --}}
                    <td class="relative px-4 py-2">
                      <div class="relative inline-block text-left">
                        <form method="POST" action="{{ route('laporan.updateStatus', $laporan->id) }}">
                          @csrf
                          @method('PATCH')
                          <button type="button"
                            onclick="document.getElementById('dropdown-{{ $loop->index }}').classList.toggle('hidden')"
                            class="inline-flex justify-center px-4 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                            Ubah Status
                            <svg class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.08 0L5.25 8.27a.75.75 0 01-.02-1.06z"
                                clip-rule="evenodd" />
                            </svg>
                          </button>
                          <div id="dropdown-{{ $loop->index }}"
                            class="absolute z-10 hidden mt-2 origin-top-right bg-white rounded-md shadow-lg w-44 ring-1 ring-black ring-opacity-5">
                            <div class="py-1 text-sm">
                              <button type="submit" name="status" value="Baru"
                                class="block w-full px-4 py-2 text-left text-gray-800 bg-green-100 hover:bg-green-200">
                                Baru
                              </button>
                              <button type="submit" name="status" value="Dalam Proses"
                                class="block w-full px-4 py-2 text-left text-gray-800 bg-blue-300 hover:bg-blue-400">
                                Dalam Proses
                              </button>
                              <button type="submit" name="status" value="Selesai"
                                class="block w-full px-4 py-2 text-left text-gray-800 bg-red-100 hover:bg-red-200">
                                Selesai
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </td>

                    {{-- Kolom Feedback: Chat via WhatsApp --}}
                    <td class="px-4 py-2">
                      <a href="https://wa.me/{{ $noHp }}?text={{ $msgEncoded }}" target="_blank"
                        class="inline-block px-4 py-1 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                        Chat via WhatsApp
                      </a>
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
