<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Ketersediaan Ruang Bedah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-50">

    <!-- Navbar -->
    <div class="w-full bg-white shadow-md p-4 flex items-center justify-between">
        <!-- Kiri: Logo -->
        <img alt="Logo" class="rounded-full h-10" src="image/logo.png"/>
        
        <!-- Kanan: Tombol Aksi -->
        <div class="flex items-center space-x-4">
            <button onclick="tampilkanModalTambahRuang()" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition shadow">
                Tambah Ruang Bedah
            </button>
            <a href="#" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition shadow">
                Logout
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="p-10">
        <h1 class="text-2xl font-bold mb-6">Dashboard Ketersediaan Ruang Bedah</h1>

        <div class="mb-6 p-4 bg-white shadow rounded-lg">
            <p class="text-lg">Jumlah Ruang Bedah Tersedia: 
                <span id="ruang-Bedah" class="font-bold text-blue-500">5</span>
            </p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-4 mb-6">
            <h2 class="text-lg font-bold mb-4">Detail Data Pasien</h2>
            <table class="min-w-full">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 text-left">Nama</th>
                        <th class="py-2 px-4 text-left">Keluhan</th>
                        <th class="py-2 px-4 text-left">Status</th>
                        <th class="py-2 px-4 text-left">Apakah perlu ruang bedah?</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-100 cursor-pointer">
                        <td class="py-2 px-4 text-justify text-blue-600 hover:underline cursor-pointer" 
                            onclick="bukaModal('Jane Cooper', {
                                tekanan: '120/80 mmHg',
                                nafas: '18x/menit',
                                gula: '110 mg/dL',
                                jantung: '75 bpm',
                                suhu: '36.5°C',
                                oksigen: '98%'
                            })">
                            Jane Cooper
                        </td>
                        <td class="py-2 px-4 text-justify">Cedera Kepala</td>
                        <td class="py-2 px-4">
                            <select class="border rounded-lg p-2" onchange="updateStatus(this)">
                                <option value="pending">Pending</option>
                                <option value="ditolak">Ditolak</option>
                                <option value="ditangani">Ditangani</option>
                                <option value="selesai" disabled>Selesai</option>
                            </select>
                        </td>
                        <td class="py-2 px-4 text-center flex gap-2 justify-center">
                            <button 
                                class="btn-perlu bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600"
                                onclick="handleRuangBedah(this, true)">
                                Perlu
                            </button>
                            <button 
                                class="btn-tidak bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                onclick="handleRuangBedah(this, false)">
                                Tidak Perlu
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Diagnosa -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <h3 class="text-xl font-bold mb-4">Diagnosa Sementara</h3>
            <p><span class="font-semibold">Nama:</span> <span id="modal-nama"></span></p>
            <p><span class="font-semibold">Tekanan Darah:</span> <span id="modal-tekanan"></span></p>
            <p><span class="font-semibold">Nafas:</span> <span id="modal-nafas"></span></p>
            <p><span class="font-semibold">Gula Darah:</span> <span id="modal-gula"></span></p>
            <p><span class="font-semibold">Denyut Jantung:</span> <span id="modal-jantung"></span></p>
            <p><span class="font-semibold">Suhu Tubuh:</span> <span id="modal-suhu"></span></p>
            <p><span class="font-semibold">Saturasi Oksigen:</span> <span id="modal-oksigen"></span></p>
            <button onclick="tutupModal()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Tutup</button>
        </div>
    </div>

    <!-- Modal Tambah Ruang Bedah -->
    <div id="modalTambahRuang" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <h3 class="text-xl font-bold mb-4">Tambah Ruang Bedah</h3>
            <input id="jumlah-baru" class="border rounded-lg p-2 w-full mb-4" type="number" placeholder="Jumlah ruang tambahan"/>
            <div class="flex justify-end gap-2">
                <button onclick="tutupModalTambahRuang()" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</button>
                <button onclick="tambahRuang()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        let ruangBedah = 5;

        function updateStatus(select) {
            if (select.value === 'ditangani') {
                ruangBedah--;
            } else if (select.value === 'selesai') {
                ruangBedah++;
            }
            document.getElementById('ruang-Bedah').innerText = ruangBedah;
        }

        function bukaModal(nama, diagnosa) {
            document.getElementById('modal-nama').innerText = nama;
            document.getElementById('modal-tekanan').innerText = diagnosa.tekanan;
            document.getElementById('modal-nafas').innerText = diagnosa.nafas;
            document.getElementById('modal-gula').innerText = diagnosa.gula;
            document.getElementById('modal-jantung').innerText = diagnosa.jantung;
            document.getElementById('modal-suhu').innerText = diagnosa.suhu;
            document.getElementById('modal-oksigen').innerText = diagnosa.oksigen;
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('modal').classList.add('flex');
        }

        function tutupModal() {
            document.getElementById('modal').classList.remove('flex');
            document.getElementById('modal').classList.add('hidden');
        }

        function tampilkanModalTambahRuang() {
            document.getElementById('modalTambahRuang').classList.remove('hidden');
            document.getElementById('modalTambahRuang').classList.add('flex');
        }

        function tutupModalTambahRuang() {
            document.getElementById('modalTambahRuang').classList.remove('flex');
            document.getElementById('modalTambahRuang').classList.add('hidden');
        }

        function tambahRuang() {
            let jumlah = parseInt(document.getElementById('jumlah-baru').value) || 0;
            if (jumlah > 0) {
                ruangBedah += jumlah;
                document.getElementById('ruang-Bedah').innerText = ruangBedah;
                tutupModalTambahRuang();
                document.getElementById('jumlah-baru').value = '';
            } else {
                alert("Masukkan jumlah ruang yang valid.");
            }
        }

        function handleRuangBedah(button, isPerlu) {
            const container = button.parentElement;
            const btnPerlu = container.querySelector('.btn-perlu');
            const btnTidak = container.querySelector('.btn-tidak');

            if (btnPerlu.disabled || btnTidak.disabled) {
                return;
            }

            if (isPerlu) {
                if (ruangBedah > 0) {
                    ruangBedah--;
                    document.getElementById('ruang-Bedah').innerText = ruangBedah;

                    btnPerlu.classList.remove('hover:bg-green-600');
                    btnPerlu.classList.add('bg-green-500');

                    btnTidak.classList.remove('bg-red-500', 'hover:bg-red-600');
                    btnTidak.classList.add('bg-gray-400', 'cursor-not-allowed');
                } else {
                    alert("Tidak ada ruang Bedah yang tersedia.");
                    return;
                }
            } else {
                btnPerlu.classList.remove('bg-green-500', 'hover:bg-green-600');
                btnPerlu.classList.add('bg-gray-400', 'cursor-not-allowed');
                
                btnTidak.classList.add('bg-red-500');
            }

            btnPerlu.disabled = true;
            btnTidak.disabled = true;
        }
    </script>
</body>
</html>
