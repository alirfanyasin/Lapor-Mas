@extends('layouts.template')
@section('content')
  <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
    <div class="card">
      <div class="card-header">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

          <div class="flex items-center gap-3 " id="user-info">
            <div class="flex-shrink-0">
              <img class="rounded-full w-11 h-11"
                src="https://ui-avatars.com/api/?name={{ $data->nama }}&background=random&color=FFF"
                alt="{{ $data->nama }} image">
            </div>
            <div>
              <h4 class="font-semibold">{{ $data->nama }}</h4>

              <a href="https://wa.me/{{ $data->telepon }}?text={{ urlencode('Halo ' . $data->nama . ', terima kasih atas laporan Anda. Mohon tunggu, kami akan menindaklanjuti dalam 1x24 jam.') }}"
                target="_blank"
                class="flex items-center px-2 py-1 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600">
                <iconify-icon icon="ic:twotone-whatsapp" width="24" height="24"></iconify-icon>
                <small class="ms-1">Feedback</small>
              </a>
            </div>
          </div>

          <div class="w-full text-start md:text-end" id="report-info">
            <p class="font-semibold">{{ $data->kategori }} - <span class="text-yellow-600">{{ $data->status }}</span></p>
            <p>{{ $data->lokasi }}</p>
            <p>{{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('j F Y') }}</p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="flex flex-wrap items-center gap-2">
          <h4 class="text-xl font-semibold text-center">{{ $data->judul }}</h4>
          <hr class="my-2 border-default-200" />
          {!! $data->laporan !!}
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <div class="">
          <h5 class="mb-1 text-lg font-medium capitalize text-default-950">Lampiran
          </h5>
          <p class="text-sm font-medium text-default-600">Lapiran dari laporan</p>
        </div>
      </div>
      <div class="card-body">
        <div class="flex flex-wrap items-center gap-2">
          <div>
            <img src="{{ asset('storage/lampirans/' . $data->lampiran) }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
