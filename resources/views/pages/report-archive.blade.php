@extends('layouts.template')
@section('content')
  <div class="overflow-hidden card">
    <div class="card-header">
      <h4 class="card-title">Arsip Laporan</h4>
      <p class="mt-1 text-base text-default-500">Berikut adalah data arsip laporan</p>
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
@endpush
