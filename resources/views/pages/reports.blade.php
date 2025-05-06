@extends('layouts.template')
@section('content')
  <div class="overflow-hidden card">
    <div class="card-header">
      <h4 class="card-title">Daftar Laporan</h4>
      <p class="mt-1 text-base text-default-500">Berikut adalah laporan yang masuk</p>
    </div>
    <div>
      <div class="overflow-x-auto">
        <div class="inline-block min-w-full align-middle">
          <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-default-200">
              <thead>
                <tr>
                  <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                    Nama Pelapor</th>
                  <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                    Jenis Laporan
                  </th>
                  <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                    Judul
                  </th>
                  <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                    Tanggal</th>
                  <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                    Status</th>
                  <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                    Aksi</th>
                  <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                    Detail</th>
                  <th scope="col" class="px-6 py-3 text-sm text-start text-default-500">
                    Feedback</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($reports as $report)
                  <tr class="odd:bg-white even:bg-default-100">
                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-default-800">
                      {{ $report->nama }}</td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                      {{ $report->kategori }}</td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                      {{ $report->judul }}</td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                      {{ $report->tanggal }}</td>
                    <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                      {{ $report->status }}</td>
                    <td class="relative px-6 py-4 text-sm whitespace-nowrap text-default-800">
                      <div class="relative inline-block text-left">
                        <form method="POST" action="{{ route('laporan.updateStatus', $report->id) }}">
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
                          {{-- <div class="relative"> --}}
                          <div id="dropdown-{{ $loop->index }}"
                            class="relative z-10 hidden mt-2 origin-top-right bg-white rounded-md shadow-lg w-44 ring-1 ring-black ring-opacity-5">
                            <div class="py-1 text-sm">
                              <button type="submit" name="status" value="Baru"
                                class="block w-full px-4 py-2 text-left text-gray-800 bg-green-100 hover:bg-green-200">
                                Baru
                              </button>
                              <button type="submit" name="status" value="Proses"
                                class="block w-full px-4 py-2 text-left text-gray-800 bg-blue-300 hover:bg-blue-400">
                                Dalam Proses
                              </button>
                              <button type="submit" name="status" value="Selesai"
                                class="block w-full px-4 py-2 text-left text-gray-800 bg-red-100 hover:bg-red-200">
                                Selesai
                              </button>
                            </div>
                            {{-- </div> --}}
                          </div>
                        </form>
                      </div>
                    </td>

                    <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                      <a href="{{ route('report.show', $report->id) }}"
                        class="flex items-center px-2 py-1 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">
                        <iconify-icon icon="ic:twotone-info" width="24" height="24"></iconify-icon>
                        <small class="ms-1">lihat Detail</small>
                      </a>

                      {{-- Kolom Feedback: Chat via WhatsApp --}}
                    <td class="px-6 py-4 text-sm whitespace-nowrap text-default-800">
                      <a href="https://wa.me/{{ $report->telepon }}?text={{ urlencode('Halo ' . $report->nama . ', terima kasih atas laporan Anda. Mohon tunggu, kami akan menindaklanjuti dalam 1x24 jam.') }}"
                        target="_blank"
                        class="flex items-center px-2 py-1 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                        <iconify-icon icon="ic:twotone-whatsapp" width="24" height="24"></iconify-icon>
                        <small class="ms-1">Feedback</small>
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
  </div> <!-- end card -->
@endsection
@push('js')
  <script script src="https://code.iconify.design/iconify-icon/2.3.0/iconify-icon.min.js"></script>
  <!-- JavaScript Toggle -->
  <script>
    function toggleSelect(id) {
      const form = document.getElementById('form-' + id);
      form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
  </script>
@endpush
