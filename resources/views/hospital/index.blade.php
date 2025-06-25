<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>All hospitals</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-50">
<div class="flex">
  <!-- Sidebar -->
  <div class="w-64 bg-white h-screen shadow-md">
    <div class="flex items-center justify-center h-16 border-b">
      <img src="image/logo.png" alt="Logo" class="rounded-full h-10"/>
    </div>
    <nav class="mt-10">
      <a href="#" class="flex items-center py-2 px-8  text-gray-600 hover:bg-gray-200"><i class="fas fa-bell mr-3"></i>Notif</a>
      <a href="#" class="flex items-center py-2 px-8 text-gray-600 hover:bg-gray-200"><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</a>
      <a href="{{route('patients.index')}}" class="flex items-center py-2 px-8 "><i class="fas fa-database mr-3  text-gray-600 hover:bg-gray-200"></i>Data User</a>
      <a href="{{route('hospital.index')}}" class="flex items-center py-2 px-8 bg-gradient-to-r from-green-400 to-blue-500 text-white hover:bg-gray-200"><i class="fas fa-database mr-3"></i>Data RS</a>
      <a href="#" class="flex items-center py-2 px-8 text-gray-600 hover:bg-gray-200"><i class="fas fa-user mr-3"></i>Profile</a>
    </nav>
  </div>

  <!-- Main Content -->
  <div class="flex-1 p-10">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">All hospitals</h1>
      <div class="flex items-center">
        <input type="text" placeholder="Search" class="border rounded-lg py-2 px-4 mr-4"/>
        <button onclick="document.getElementById('modal').classList.remove('hidden')" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
          Add hospital
        </button>
      </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
      <table class="min-w-full bg-white">
        <thead class="bg-gray-200">
        <tr>
          <th class="py-2 px-4">Nama Rumah Sakit</th>
          <th class="py-2 px-4">Alamat</th>
          <th class="py-2 px-4">Alat </th>
          <th class="py-2 px-4">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($hospitals as $hospital)
        <tr class="hover:bg-gray-100">
          <td class="py-2 px-4">{{ $hospital->name }}</td>
          <td class="py-2 px-4">{{ $hospital->address }}</td>
          <td class="py-2 px-4">{{ $hospital->alat}}</td>
          <td class="py-2 px-4">
            <button onclick="toggleEditModal({{ $hospital->id }})" class="text-blue-500 hover:underline">Edit</button>
            <form method="POST" action="{{ route('hospital.destroy', $hospital) }}" class="inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
            </form>
          </td>
        </tr>

        <!-- Edit Modal -->
        <div id="editModal-{{ $hospital->id }}" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center z-50 edit-modal">
          <div class="bg-white w-full max-w-md rounded-lg p-6 relative">
            <button onclick="closeEditModal({{ $hospital->id }})" class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-xl">&times;</button>
            <h2 class="text-xl font-bold mb-4">Edit Rumah Sakit</h2>
            <form method="POST" action="{{ route('hospital.update', $hospital->id) }}">
              @csrf
              @method('PUT')
              <div class="mb-4">
                <label class="block mb-1">Nama</label>
                <input type="text" name="name" value="{{ $hospital->name }}" class="w-full border rounded px-3 py-2" required/>
              </div>
              <div class="mb-4">
                <label class="block mb-1">Alamat</label>
                <input type="text" name="address" value="{{ $hospital->address }}" class="w-full border rounded px-3 py-2" required/>
              </div>
              <div class="mb-4">
                <label class="block mb-1">Alat</label>
                <input type="text" name="alat" value="{{ $hospital->alat }}" class="w-full border rounded px-3 py-2" required/>
              </div>
              <div class="text-right">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Update</button>
              </div>
            </form>
          </div>
        </div>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Tambah Pasien -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center z-50">
  <div class="bg-white w-full max-w-md rounded-lg p-6 relative">
    <button onclick="document.getElementById('modal').classList.add('hidden')" class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-xl">&times;</button>
    <h2 class="text-xl font-bold mb-4">Tambah Rumah Sakit</h2>
    <form method="POST" action="{{route('hospital.store')}}">
      @csrf
      <div class="mb-4">
        <label class="block mb-1">Nama</label>
        <input type="text" name="name" class="w-full border rounded px-3 py-2" required/>
      </div>
      <div class="mb-4">
        <label class="block mb-1">Alamat</label>
        <input type="text" name="address" class="w-full border rounded px-3 py-2" required/>
      </div>
      <div class="mb-4">
        <label class="block mb-1">Alat</label>
        <input type="text" name="alat" class="w-full border rounded px-3 py-2" required/>
      </div>
      <div class="text-right">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- Scripts -->
<script>
  function toggleEditModal(id) {
    document.querySelectorAll('.edit-modal').forEach(modal => modal.classList.add('hidden'));
    document.getElementById(`editModal-${id}`).classList.remove('hidden');
  }

  function closeEditModal(id) {
    document.getElementById(`editModal-${id}`).classList.add('hidden');
  }
</script>

</body>
</html>
