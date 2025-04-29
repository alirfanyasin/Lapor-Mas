<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LAPOR!</title>
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
  @vite('resources/css/app.css')

</head>

<body>
  <div class="my-8 text-center">
    <h1 class="mb-2 text-2xl font-bold md:text-3xl" style="color: #E0A424;">
      Layanan Aspirasi dan Pengaduan Online Desa Sadang
    </h1>
    <p class="text-base text-gray-600 md:text-lg">
      Sampaikan laporan Anda langsung kepada instansi yang berwenang
    </p>
  </div>

  <section class="mb-8 form-pengajuan">

    <div class="max-w-3xl p-8 mx-auto bg-white rounded shadow-md">
      <h1 class="mb-6 text-2xl font-bold text-red-600">Sampaikan Laporan Anda</h1>
      <form class="space-y-4">
        <div class="mb-4">
          <div class="flex space-x-4">
            <select class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500">
              <option>Pilih Klasifikasi Laporan Anda</option>
              <option value="pengaduan">Pengaduan</option>
              <option value="aspirasi">Aspirasi</option>
              <option value="informasi">Permintaan Informasi</option>
            </select>
          </div>
        </div>
        <div>
          <input type="text" placeholder="Ketik Nama Pelapor *"
            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>
        <div>
          <input type="text" placeholder="Ketik Judul Laporan Anda *"
            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>
        <div>
          <textarea placeholder="Ketik Isi Laporan Anda *" rows="5" id="editor"
            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
        </div>
        <div class="relative">
          <input type="date" placeholder="Pilih Tanggal Kejadian *"
            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>
        <div>
          <input type="text" placeholder="Ketik Lokasi Kejadian *"
            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500">
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
          <button class="px-6 py-2 font-bold text-white bg-red-600 rounded hover:bg-red-700"
            onclick="getEditorContent()">LAPOR!</button>
        </div>
      </form>
  </section>


  <script src="https://code.iconify.design/iconify-icon/2.3.0/iconify-icon.min.js"></script>
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
