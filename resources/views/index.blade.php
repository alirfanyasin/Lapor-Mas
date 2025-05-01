<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title ?? '' . ' | ' . env('APP_NAME') }}</title>
  {{-- Quil Editor --}}
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

  {{-- Vite --}}
  @vite('resources/css/app.css')

</head>

<body class="relative bg-gray-200">
  <div id="particles-js" class="fixed w-full"> </div>
  <div class="fixed w-full">
    <div class="w-full h-52 md:h-20 bg-green-light"></div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#00cba9" fill-opacity="1"
        d="M0,64L24,96C48,128,96,192,144,229.3C192,267,240,277,288,282.7C336,288,384,288,432,256C480,224,528,160,576,154.7C624,149,672,203,720,197.3C768,192,816,128,864,112C912,96,960,128,1008,165.3C1056,203,1104,245,1152,229.3C1200,213,1248,139,1296,96C1344,53,1392,43,1416,37.3L1440,32L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z">
      </path>
    </svg>
  </div>

  <main class="absolute inset-x-0 flex items-center justify-center mb-10 top-10 ">



    <section class="mb-8 form-pengajuan">

      @if (session('success'))
        <div id="alert-box"
          class="fixed z-50 flex items-center justify-between w-full max-w-md px-6 py-4 text-green-700 transform -translate-x-1/2 bg-green-100 border border-green-400 rounded-lg shadow-lg top-5 left-1/2 slide-down">
          <span class="font-semibold">Berhasil!</span>
          <button onclick="closeAlert()" class="ml-4 text-2xl font-bold text-green-700 hover:text-green-900">
            &times;
          </button>
        </div>
      @endif


      <header class="my-8 text-center text-white">
        <h1 class="mb-2 text-xl font-bold md:text-2xl lg:text-3xl">
          Layanan Aspirasi dan Pengaduan Online Desa Sadang
        </h1>
        <p class="text-sm md:text-lg">
          Sampaikan laporan Anda langsung kepada instansi yang berwenang
        </p>
      </header>

      <div class="p-8 mx-3 bg-white shadow-xl rounded-xl md:mx-auto md:max-w-3xl">
        <h1 class="mb-6 text-xl font-bold text-center md:text-2xl text-green-light">Sampaikan Laporan Anda</h1>
        <form action="{{ route('store.report') }}" class="space-y-4" method="POST" enctype="multipart/form-data"
          onsubmit="syncQuillContent()">
          @csrf
          <div class="mb-4">
            <div class="flex space-x-4">
              <select name="kategori"
                class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-[#00cba9]">
                <option selected disabled>Pilih Klasifikasi Laporan Anda</option>
                <option value="Pengaduan">Pengaduan</option>
                <option value="Aspirasi">Aspirasi</option>
                <option value="Permintaan Informasi">Permintaan Informasi</option>
              </select>
            </div>
            @error('kategori')
              <small class="text-red-800">{{ $message }}</small>
            @enderror
          </div>
          <div>
            <input type="text" placeholder="Ketik Nama Pelapor *" name="nama"
              class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-[#00cba9]"
              value="{{ old('nama') }}">
            @error('nama')
              <small class="text-red-800">{{ $message }}</small>
            @enderror
          </div>
          <div>
            <input type="number" placeholder="Nomor Whatsapp *" name="telepon"
              class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-[#00cba9]"
              value="{{ old('telepon') }}">
            @error('telepon')
              <small class="text-red-800">{{ $message }}</small>
            @enderror
          </div>
          <div>
            <input type="text" placeholder="Ketik Judul Laporan Anda *" name="judul"
              class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-[#00cba9]"
              value="{{ old('judul') }}">
            @error('judul')
              <small class="text-red-800">{{ $message }}</small>
            @enderror
          </div>
          <div>
            <div id="editor" class="min-h-40"></div>
            <input type="hidden" name="laporan" id="laporan">
            @error('laporan')
              <small class="text-red-800">{{ $message }}</small>
            @enderror
          </div>
          <div class="relative">
            <input type="date" placeholder="Pilih Tanggal Kejadian *" name="tanggal"
              class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-[#00cba9]"
              value="{{ old('tanggal') }}">
            @error('tanggal')
              <small class="text-red-800">{{ $message }}</small>
            @enderror
          </div>
          <div>
            <input type="text" placeholder="Ketik Lokasi Kejadian *" name="lokasi"
              class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-[#00cba9]"
              value="{{ old('lokasi') }}">
            @error('lokasi')
              <small class="text-red-800">{{ $message }}</small>
            @enderror
          </div>

          <div class="w-full mx-auto">
            <label for="file-upload"
              class="flex flex-col items-center justify-center w-full h-48 transition border-2 @error('lampiran') border-red-800 @enderror border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100"
              ondragover="event.preventDefault()" ondrop="handleDrop(event)">
              <iconify-icon icon="octicon:upload-16" width="50" height="50" class="text-gray-200"></iconify-icon>
              <p class="text-sm text-center text-gray-500">
                <span class="block text-lg font-bold">Upload Lampiran</span>
                <span class="font-semibold">Click to upload</span> or drag and drop
              </p>
              <input id="file-upload" type="file" class="hidden" name="lampiran" onchange="previewFile()" />
            </label>

            <!-- Loading -->
            <div id="loading" class="flex items-center justify-center hidden mt-4">
              <svg class="w-6 h-6 text-blue-600 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                  stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
              </svg>
              <span class="ml-2 text-sm text-gray-600">Uploading...</span>
            </div>

            <!-- Preview -->
            <div id="preview" class="mt-4 text-center"></div>
          </div>

          <div class="flex justify-end mt-6">
            <button type="submit"
              class="px-6 py-2 font-bold text-white rounded bg-green-light hover:cursor-pointer hover:bg-green-700">LAPOR!</button>
          </div>
        </form>
      </div>
    </section>
  </main>

  @include('partials.js-home')
  <script>
    // Fungsi untuk menyalin konten ke input sebelum submit
    function syncQuillContent() {
      const html = quill.root.innerHTML;
      document.getElementById('laporan').value = html;
    }

    @if (old('laporan'))
      quill.root.innerHTML = `{!! old('laporan') !!}`;
      document.getElementById('laporan').value = `{!! old('laporan') !!}`;
    @endif
  </script>
</body>

</html>
