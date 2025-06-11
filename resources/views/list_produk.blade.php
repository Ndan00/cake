<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style/dog.css">
    <link href="styles/flowbite.min.css" rel="stylesheet">
    <script src="styles/flowbite.min.js"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900">

{{-- Header --}}
<nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="image/dog.jpg" class="h-8" alt="Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Cake & Brownies</span>
    </a>
    <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden
     hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
      <ul class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
        <li>
          <a href="#" data-modal-target="tambah-produk-modal" data-modal-toggle="tambah-produk-modal"
             class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent">
             Tambah Produk
          </a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700">Produk</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700">Info</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700">Tentang Toko</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
{{-- END Header --}}

{{-- Tabel Produk --}}
<div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Nama Produk</th>
                <th scope="col" class="px-6 py-3">Deskripsi Produk</th>
                <th scope="col" class="px-6 py-3">Harga Produk</th>
                <th scope="col" class="px-6 py-3">Delete</th>
                <th scope="col" class="px-6 py-3">Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nama as $index => $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $index + 1 }}
                </th>
                <td class="px-6 py-4">
                    {{ $item }}
                </td>
                <td class="px-6 py-4">
                    {{ $desc[$index] }}
                </td>
                <td class="px-6 py-4">
                    Rp.{{($harga[$index])}}
                </td>
                <td>
                    <form action="{{ route('produk.delete', $id[$index]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                              onclick="return confirm('Are You Sure you want to delete {{ $item }}?')"
                              class="cursor-pointer text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                               Delete
                        </button>

                    </form>
                </td>
                <td>
                    <button type="button" 
                            class="edit-button cursor-pointer text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800"
                            data-id="{{ $id[$index] }}"
                            data-nama="{{ $item }}"
                            data-deskripsi="{{ $desc[$index] }}"
                            data-harga="{{ $harga[$index] }}">
                        Edit
                    </button>
                </td>

                            
            @endforeach
        </tbody>
    </table>
</div>

{{-- Modal Tambah Produk --}}
<div id="tambah-produk-modal" tabindex="-1" aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-2xl max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

      <!-- Header Modal -->
      <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Tambah Produk</h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tambah-produk-modal">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>

      <!-- Form Modal -->
      <div class="p-6 space-y-6">
        <form method="POST" action="{{ route('produk.simpan') }}">
          @csrf

          <div>
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk</label>
            <input type="text" id="nama" name="nama" required
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                          dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
          </div>

          <div>
            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                             dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
          </div>

          <div>
            <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
            <input type="number" id="harga" name="harga" required
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                          dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
          </div>

          <div class="flex justify-end pt-4">
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5
                           dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Simpan
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
{{-- END Modal --}}


{{-- Modal edit --}}

{{-- Modal Tambah/Edit Produk --}}
<div id="tambah-produk-modal" tabindex="-1" aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-2xl max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

      <!-- Header Modal -->
      <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
        <h3 id="modal-title" class="text-xl font-semibold text-gray-900 dark:text-white">Tambah Produk</h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tambah-produk-modal">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>

      <!-- Form Modal -->
      <div class="p-6 space-y-6">
        <form method="POST" action="{{ route('produk.simpan') }}" id="produk-form">
          @csrf
          <input type="hidden" id="edit-id" name="id">

          <div>
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk</label>
            <input type="text" id="nama" name="nama" required
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                          dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
          </div>

          <div>
            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                             dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
          </div>

          <div>
            <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
            <input type="number" id="harga" name="harga" required
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                          dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
          </div>

          <div class="flex justify-end pt-4">
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5
                           dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Simpan
            </button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
{{-- END Modal --}}


{{-- end Modal edit --}}

{{-- DELETE --}}
{{-- <table>
  <thead>
    <tr>No</tr>
    <tr>Nama Produk</tr>
    <tr>Deskripsi Produk</tr>
    <tr>Harga Produk</tr>
    <tr>Action</tr>
  </thead>
</table>

<tbody>
  @foreach ($nama as $index => $item)
    <tr>
      <td>{{ $index + 1 }}</td>
      <td>{{ $item }}</td>
      <td>{{ $desc[$index] }}</td>
      <td>{{ $harga[$index] }}</td>
      <td>
        <form action="{{ route('produk.delete', $id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('Are You Sure you want to delete {{ $item }}?')">Delete</button>
        </form>
      </td>
    </tr>
    
  @endforeachy
</tbody> --}}


{{-- END DELETE --}}

{{-- Footer --}}
<footer class="bg-white dark:bg-gray-800 shadow-sm mt-10">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="#" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="image/dog.jpg" class="h-8" alt="Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Cake & Brownies</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li><a href="#" class="hover:underline me-4 md:me-6">About</a></li>
                <li><a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a></li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 dark:border-gray-700" />
        <span class="block text-sm text-gray-500 text-center dark:text-gray-400">©  <a href="#" class="hover:underline">3312411004</a>. ~~Hamdan Azmi~~.</span>
    </div>
</footer>


<script>
    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const nama = this.getAttribute('data-nama');
            const deskripsi = this.getAttribute('data-deskripsi');
            const harga = this.getAttribute('data-harga');

            // Set values in the modal
            document.getElementById('edit-id').value = id;
            document.getElementById('nama').value = nama;
            document.getElementById('deskripsi').value = deskripsi;
            document.getElementById('harga').value = harga;

            // Change modal title
            document.getElementById('modal-title').innerText = 'Edit Produk';

            // Show modal
            const modal = document.getElementById('tambah-produk-modal');
            modal.classList.remove('hidden');
        });
    });
</script>

</body>
</html>
