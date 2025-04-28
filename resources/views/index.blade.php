<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPOR!</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="text-center my-8">
        <h1 class="text-2xl md:text-3xl font-bold mb-2" style="color: #E0A424;">
            Layanan Aspirasi dan Pengaduan Online Warga Sadang
        </h1>
        <p class="text-gray-600 text-base md:text-lg">
            Sampaikan laporan Anda langsung kepada instansi yang berwenang
        </p>
    </div>
    
    <section class="form-pengajuan mb-8">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded shadow-md">
            <h1 class="text-2xl font-bold text-red-600 mb-6">Sampaikan Laporan Anda</h1>
        
            <div class="mb-4">
            <label class="block text-gray-700 mb-2">Pilih Klasifikasi Laporan</label>
                <div class="flex space-x-4">
                    <button class="flex-1 border-2 border-red-600 text-red-600 py-2 rounded hover:bg-red-600 hover:text-white">Pengaduan</button>
                    <button class="flex-1 border-2 border-red-600 text-red-600 py-2 rounded hover:bg-red-600 hover:text-white">Aspirasi</button>
                    <button class="flex-1 border-2 border-red-600 text-red-600 py-2 rounded hover:bg-red-600 hover:text-white">Permintaan Informasi</button>
                </div>
            </div>

            <div class="bg-gray-100 p-4 rounded mb-4 text-center text-sm text-gray-600 relative">
                Perhatikan Cara Menyampaikan Pengaduan Yang Baik dan Benar
                <button class="absolute right-4 top-4 text-red-600">?</button>
            </div>

            <form class="space-y-4">
                <div>
                    <input type="text" placeholder="Ketik Judul Laporan Anda *" class="w-full border p-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>
                <div>
                    <textarea placeholder="Ketik Isi Laporan Anda *" rows="5" class="w-full border p-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
                </div>
                <div class="relative">
                    <input type="date" placeholder="Pilih Tanggal Kejadian *" class="w-full border p-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>
                <div>
                    <input type="text" placeholder="Ketik Lokasi Kejadian *" class="w-full border p-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>
                <div>
                    <input type="text" placeholder="Ketik Instansi Tujuan" class="w-full border p-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>

                <div>
                    <select class="w-full border p-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option>Pilih Kategori Laporan Anda</option>
                    </select>
                </div>

                <div class="flex items-center space-x-4">
                    <label class="flex items-center space-x-2">
                        <input type="file" class="hidden" accept="image/*,application/pdf">
                        <span>Upload Lampiran</span>
                    </label>
                </div>

                <div class="flex items-center space-x-6 mt-4">
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
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded">LAPOR!</button>
                </div>
            </form>
    </section>
</body>
</html>