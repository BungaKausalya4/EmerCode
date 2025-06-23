<!DOCTYPE html>
<html>
<head>
    <title>All Patients</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-50">
<div class="flex">
    <!-- Sidebar -->
    <div class="w-64 bg-white h-screen shadow-md">
        <div class="flex items-center justify-center h-16 border-b">
            <img alt="Logo" class="rounded-full" height="20" src="image/logo.png"/>
        </div>
        <nav class="mt-10">
            <a class="flex items-center py-2 px-8 bg-gradient-to-r from-green-400 to-blue-500 text-white" href="#">
                <i class="fas fa-bell mr-3"></i>
                <span>Notif</span>
            </a>
            <a class="flex items-center py-2 px-8 text-gray-600 hover:bg-gray-200" href="#">
                <i class="fas fa-tachometer-alt mr-3"></i>
                <span>Dashboard</span>
            </a>
            <a class="flex items-center py-2 px-8 text-gray-600 hover:bg-gray-200" href="#">
                <i class="fas fa-database mr-3"></i>
                <span>Data</span>
            </a>
            <a class="flex items-center py-2 px-8 text-gray-600 hover:bg-gray-200" href="#">
                <i class="fas fa-user mr-3"></i>
                <span>Profile</span>
            </a>
        </nav>
    </div>
    <!-- Main Content -->
    <div class="flex-1 p-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">All Patients</h1>
            <div class="flex items-center">
                <input class="border rounded-lg py-2 px-4 mr-4" placeholder="Search" type="text"/>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Add Patient</button>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4">Nama Pasien</th>
                        <th class="py-2 px-4">Keluhan</th>
                        <th class="py-2 px-4">Usia</th>
                        <th class="py-2 px-4">Jenis Kelamin</th>
                        <th class="py-2 px-4">Alamat</th>
                        <th class="py-2 px-4">Status</th>
                        <th class="py-2 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4">Jane Cooper</td>
                        <td class="py-2 px-4">Jantung lemah, Darah Mengalir</td>
                        <td class="py-2 px-4">25</td>
                        <td class="py-2 px-4">Pria</td>
                        <td class="py-2 px-4">Suterejo</td>
                        <td class="py-2 px-4">
                            <span class="bg-green-200 text-green-800 py-1 px-3 rounded-full text-xs">Setuju</span>
                        </td>
                        <td class="py-2 px-4">
                            <button class="text-blue-500 hover:underline">Edit</button>
                            <button class="text-red-500 hover:underline ml-2">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
