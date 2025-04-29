<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LAPOR!</title>
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
  <div class="my-8 text-center">
    <h1 class="mb-2 text-2xl font-bold md:text-3xl" style="color: #E0A424;">
      Layanan Aspirasi dan Pengaduan Online Warga Sadang
    </h1>
    <p class="text-base text-gray-600 md:text-lg">
      Sampaikan laporan Anda langsung kepada instansi yang berwenang
    </p>
  </div>

  <section class="mb-8 form-pengajuan">
    <div class="max-w-3xl p-8 mx-auto bg-white rounded shadow-md">
      <h1 class="mb-6 text-2xl font-bold text-red-600">Sampaikan Laporan Anda</h1>

      <div class="mb-4">
        <label class="block mb-2 text-gray-700">Pilih Klasifikasi Laporan</label>
        <div class="flex space-x-4">
          <button
            class="flex-1 py-2 text-red-600 border-2 border-red-600 rounded hover:bg-red-600 hover:text-white">Pengaduan</button>
          <button
            class="flex-1 py-2 text-red-600 border-2 border-red-600 rounded hover:bg-red-600 hover:text-white">Aspirasi</button>
          <button
            class="flex-1 py-2 text-red-600 border-2 border-red-600 rounded hover:bg-red-600 hover:text-white">Permintaan
            Informasi</button>
        </div>
      </div>

      <div class="relative p-4 mb-4 text-sm text-center text-gray-600 bg-gray-100 rounded">
        Perhatikan Cara Menyampaikan Pengaduan Yang Baik dan Benar
        <button class="absolute text-red-600 right-4 top-4">?</button>
      </div>

      <form class="space-y-4">
        <div>
          <input type="text" placeholder="Ketik Judul Laporan Anda *"
            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>
        <div>
          <div id="editor"
            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500 min-h-[300px]">
          </div>
          {{-- <textarea placeholder="Ketik Isi Laporan Anda *" rows="5" id="laporan"
            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500"></textarea> --}}
        </div>
        <div class="relative">
          <input type="date" placeholder="Pilih Tanggal Kejadian *"
            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>
        <div>
          <input type="text" placeholder="Ketik Lokasi Kejadian *"
            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>
        <div>
          <input type="text" placeholder="Ketik Instansi Tujuan"
            class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <div>
          <select class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500">
            <option>Pilih Kategori Laporan Anda</option>
          </select>
        </div>

        <div
          class="flex items-center p-4 space-x-4 border-2 rounded hover:border-red-600 bg-slate-100 hover:cursor-pointer">
          <label class="flex items-center space-x-2">
            <input type="file" class="hidden" accept="image/*,application/pdf">
            <span>Upload Lampiran</span>
          </label>
        </div>

        <div class="flex items-center mt-4 space-x-6">
          <label class="flex items-center space-x-2">
            <input type="radio" name="privacy" class="text-red-600 focus:ring-red-500">
            <span>Anonim</span>
          </label>
          <label class="flex items-center space-x-2">
            <input type="radio" name="privacy" class="text-red-600 focus:ring-red-500">
            <span>Rahasia</span>
          </label>
        </div>

        <div class="flex justify-end mt-6">
          <button class="px-6 py-2 font-bold text-white bg-red-600 rounded hover:bg-red-700"
            onclick="getEditorContent()">LAPOR!</button>
        </div>
      </form>
  </section>


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
          ['image', 'video']
        ]
      }
    });

    function getEditorContent() {
      var content = quill.root.innerHTML;
      console.log(content); // Konten HTML dari editor
    }
  </script>

  {{-- <script src="https://cdn.ckeditor.com/ckeditor5/45.0.0/ckeditor5.umd.js"></script>
  <script>
    const {
      ClassicEditor,
      Essentials,
      Bold,
      Italic,
      Font,
      Paragraph,
      List,
      Table
    } = CKEDITOR;

    ClassicEditor
      .create(document.querySelector('#editor'), {
        licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3Nzc0MjA3OTksImp0aSI6ImQ3NmMxM2YzLTI4OGYtNDMyYy1iZTQ0LWJkY2Q4NTJjZTllNyIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiXSwiZmVhdHVyZXMiOlsiRFJVUCJdLCJ2YyI6ImQ1OWE3N2Q2In0.7QBoFqBBut_20-9RLlV-GZuZ0Q19ww0F_5bAXinj75qkhOOCIIylpMX7bnHN5A2NAmIM05zHasAEP7a_OfrTbw',
        plugins: [Essentials, Bold, Italic, Font, Paragraph, List, Table],
        toolbar: [
          'undo', 'redo', '|', 'bold', 'italic', '|',
          'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
          'bulletedList', 'numberedList', '|', 'insertTable'
        ],
        placeholder: 'Silakan tulis isi laporan Anda di sini...'
      })
      .then(editor => {
        window.editor = editor;
        editor.editing.view.change(writer => {
          writer.setStyle('min-height', '300px', editor.editing.view.document.getRoot());
        });
      })
      .catch(error => {
        console.error(error);
      });
  </script> --}}

</body>

</html>
