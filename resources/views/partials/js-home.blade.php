{{-- Iconify --}}
<script src="https://code.iconify.design/iconify-icon/2.3.0/iconify-icon.min.js"></script>

{{-- Particle JS --}}
<script src="{{ asset('assets/particles.js') }}"></script>
<script>
  particlesJS.load('particles-js', 'assets/particles.json', function() {
    console.log('callback - particles.js config loaded');
  });
</script>


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
</script>

<script>
  function handleDrop(event) {
    event.preventDefault();
    const files = event.dataTransfer.files;
    document.getElementById('file-upload').files = files;
    previewFile(); // show preview after drop
  }

  function previewFile() {
    const fileInput = document.getElementById('file-upload');
    const file = fileInput.files[0];
    const preview = document.getElementById('preview');
    const loading = document.getElementById('loading');

    if (!file) return;

    preview.innerHTML = '';
    loading.classList.remove('hidden');

    const reader = new FileReader();

    reader.onload = function(e) {
      setTimeout(() => {
        loading.classList.add('hidden');
        if (file.type.startsWith('image/')) {
          preview.innerHTML = `
            <p class="w-full max-w-xs mx-auto mt-2 text-sm font-semibold text-center break-words">${file.name}</p>
            <img src="${e.target.result}" alt="Preview" class="mx-auto mt-2 rounded-lg shadow max-h-48" />
          `;
        } else if (file.type === 'application/pdf') {
          preview.innerHTML = `
            <p class="mt-2 text-sm font-semibold">${file.name}</p>
            <iconify-icon icon="mdi:file-pdf" width="60" height="60" class="mx-auto mt-2 text-red-600"></iconify-icon>
          `;
        } else {
          preview.innerHTML = `<p class="text-red-600">Format tidak didukung.</p>`;
        }
      }, 1000); // Simulasi delay
    };

    if (file.type.startsWith('image/') || file.type === 'application/pdf') {
      reader.readAsDataURL(file);
    } else {
      loading.classList.add('hidden');
    }
  }

  // Alert
  const alertBox = document.getElementById('alert-box');

  function closeAlert() {
    alertBox.classList.remove('show');
    setTimeout(() => alertBox.style.display = 'none', 500); // tunggu animasi keluar
  }

  window.addEventListener('DOMContentLoaded', () => {
    alertBox.classList.add('show');

    // Otomatis tutup setelah 10 detik
    setTimeout(() => {
      closeAlert();
    }, 7000);
  });
</script>
