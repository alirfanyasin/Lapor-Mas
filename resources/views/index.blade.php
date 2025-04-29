<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>LAPOR!</title>
</head>
<body>
    <div class="text-center my-8">
        <h1 class="text-2xl md:text-3xl font-bold mb-2" style="color: #E0A424;">
            Layanan Aspirasi dan Pengaduan Online Desa Sadang
        </h1>
        <p class="text-gray-600 text-base md:text-lg">
            Sampaikan laporan Anda langsung kepada instansi yang berwenang
        </p>
    </div>
    
    <section class="form-pengajuan mb-8">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded shadow-md">
            <h1 class="text-2xl font-bold text-red-600 mb-6">Sampaikan Laporan Anda</h1>
        
        <div class="mb-4">
            <div>
                <div class="flex space-x-4">
                    <select class="w-full border p-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                        <option>Pilih Klasifikasi Laporan Anda</option>
                        <option value="pengaduan">Pengaduan</option>
                        <option value="aspirasi">Aspirasi</option>
                        <option value="informasi">Permintaan Informasi</option>
                    </select>
                </div>
            </div>
        </div>

            <div class="bg-gray-100 p-4 rounded mb-4 text-center text-sm text-gray-600 relative">
                Perhatikan Cara Menyampaikan Pengaduan Yang Baik dan Benar
                <button class="absolute right-4 top-4 text-red-600">?</button>
            </div>

            <form class="space-y-4">
                <div>
                    <input type="text" placeholder="Ketik Nama Pelapor *" class="w-full border p-3 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>
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

                <div class="flex items-center space-x-4">
                    <label class="flex items-center space-x-2">
                        <input type="file" class="hidden" accept="image/*,application/pdf">
                        <span>Upload Lampiran</span>
                    </label>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded">LAPOR!</button>
                </div>
            </form>
    </section>
</body>
</html>