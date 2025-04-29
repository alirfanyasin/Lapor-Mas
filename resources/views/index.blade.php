<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LAPOR!</title>
  {{-- Quil Editor --}}
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

  {{-- Vite --}}
  @vite('resources/css/app.css')

</head>

<body class="relative bg-gray-200">
  <div id="particles-js" class="fixed w-full"> </div>
  <div class="fixed w-full">
    <div class="w-full h-40 md:h-20 bg-green-light"></div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#00cba9" fill-opacity="1"
        d="M0,64L24,96C48,128,96,192,144,229.3C192,267,240,277,288,282.7C336,288,384,288,432,256C480,224,528,160,576,154.7C624,149,672,203,720,197.3C768,192,816,128,864,112C912,96,960,128,1008,165.3C1056,203,1104,245,1152,229.3C1200,213,1248,139,1296,96C1344,53,1392,43,1416,37.3L1440,32L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z">
      </path>
    </svg>
  </div>

  <main class="absolute inset-x-0 flex items-center justify-center mb-10 top-10">
    <section class="mb-8 form-pengajuan">
      <header class="my-8 text-center text-white">
        <h1 class="mb-2 text-2xl font-bold md:text-3xl">
          Layanan Aspirasi dan Pengaduan Online Desa Sadang
        </h1>
        <p class="text-base md:text-lg">
          Sampaikan laporan Anda langsung kepada instansi yang berwenang
        </p>
      </header>

      <div class="max-w-3xl p-8 mx-auto bg-white rounded shadow-xl">
        <h1 class="mb-6 text-2xl font-bold text-green-light">Sampaikan Laporan Anda</h1>
        <form class="space-y-4">
          <div class="mb-4">
            <div class="flex space-x-4">
              <select class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-[#00cba9]">
                <option>Pilih Klasifikasi Laporan Anda</option>
                <option value="pengaduan">Pengaduan</option>
                <option value="aspirasi">Aspirasi</option>
                <option value="informasi">Permintaan Informasi</option>
              </select>
            </div>
          </div>
          <div>
            <input type="text" placeholder="Ketik Nama Pelapor *"
              class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-[#00cba9]">
          </div>
          <div>
            <input type="text" placeholder="Ketik Judul Laporan Anda *"
              class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-[#00cba9]">
          </div>
          <div>
            <textarea placeholder="Ketik Isi Laporan Anda *" rows="5" id="editor"
              class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-[#00cba9]"></textarea>
          </div>
          <div class="relative">
            <input type="date" placeholder="Pilih Tanggal Kejadian *"
              class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-[#00cba9]">
          </div>
          <div>
            <input type="text" placeholder="Ketik Lokasi Kejadian *"
              class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-[#00cba9]">
          </div>

          <div class="w-full mx-auto">
            <label for="file-upload"
              class="flex flex-col items-center justify-center w-full h-48 transition border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100"
              ondragover="event.preventDefault()" ondrop="handleDrop(event)">
              <iconify-icon icon="octicon:upload-16" width="50" height="50" class="text-gray-200"></iconify-icon>
              <p class="text-sm text-gray-500">
                <span class="block text-lg font-bold text-center">Upload Lampiran</span>
                <span class="font-semibold">Click to upload</span> or drag and drop
              </p>
              <input id="file-upload" type="file" class="hidden" />
            </label>
          </div>

          <div class="flex justify-end mt-6">
            <button
              class="px-6 py-2 font-bold text-white rounded bg-green-light hover:cursor-pointer hover:bg-green-700"
              onclick="getEditorContent()">LAPOR!</button>
          </div>
        </form>
      </div>
    </section>
  </main>



  {{-- Particle JS --}}
  <script src="{{ asset('assets/particles.js') }}"></script>
  <script>
    particlesJS.load('particles-js', 'assets/particles.json', function() {
      console.log('callback - particles.js config loaded');
    });
  </script>

  {{-- Iconify --}}
  <script src="https://code.iconify.design/iconify-icon/2.3.0/iconify-icon.min.js"></script>

  {{-- Quill Editor --}}
  <script>
    var quill = new Quill('#editor', {
      theme: 'snow',
      placeholder: 'Silakan tulis isi laporan Anda di sini...',
      modules: {
        toolbar: [
          [{
            'header': '1'
          }, {
            'header': '2'
          }],
          [{
            'list': 'ordered'
          }, {
            'list': 'bullet'
          }],
          ['bold', 'italic', 'underline'],
          ['link'],
          [{
            'align': []
          }],
        ]
      }
    });

    function getEditorContent() {
      var content = quill.root.innerHTML;
      console.log(content); // Konten HTML dari editor
    }
  </script>
  <script>
    function handleDrop(event) {
      event.preventDefault();
      const files = event.dataTransfer.files;
      document.getElementById('file-upload').files = files;

      // Optional: tampilkan nama file
      alert(`File dropped: ${files[0].name}`);
    }
  </script>

</body>

</html>
