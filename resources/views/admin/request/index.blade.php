@extends('layouts.app', ['title' => 'Campaign - Admin Page'], ['page' => 'Pengaduan'])



@section('content')

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto py-6 px-8">
        {{-- <div class="container rounded-md shadow-md mx-auto py-6 px-8 max-h-screen h-5/6 bg-white mx-4 mt-6"> --}}
        <div class="flex items-center">
            <div class="relative mx-4">

                <span class="font-bold text-2xl">Seluruh Laporan</span>
            </div>
        </div>

        <div class=" -mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow-sm rounded-lg overflow-hidden">
                <table class="min-w-full table-auto">
                    <thead class="justify-start">
                        <tr class="bg-gray-600 w-full">
                            <th class="px-16 py-2 text-left">
                                <span class="text-white">JUDUL LAPORAN</span>
                            </th>
                            <th class="px-16 py-2">
                                <span class="text-white">PELAPOR</span>
                            </th>
                            <th class="px-16 py-2">
                                <span class="text-white">TANGGAL</span>
                            </th>
                            <th class="px-16 py-2">
                                <span class="text-white">PRIORITAS</span>
                            </th>
                            <th class="px-16 py-2">
                                <span class="text-white">STATUS</span>
                            </th>
                            <th class="px-16 py-2">
                                <span class="text-white">AKSI</span>
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-gray-200 justify-between">
                        @forelse($requests as $request)
                            <tr class="border bg-white w-full">
                                <td class="px-16 py-2">
                                    {{ $request->title }}
                                </td>
                                <td class="px-16 py-2">
                                    {{ $request->user->name }}
                                </td>
                                <td class="px-16 py-2">
                                    {{ $request->created_at}}
                                </td>
                                <td class="px-16 py-2">
                                    @switch($request->prioritas)
                                        @case('high')
                                            <span class="bg-red-500 flex-1 rounded-xl text-white px-3 py-1 text-sm ml-3">HIGH</span>
                                            @break
                                        @case('normal')
                                             <span class="bg-green-500 flex-1 rounded-xl text-white px-3 py-1 text-sm">NORMAL</span>
                                            @break
                                        @case('low')
                                             <span class="bg-yellow-500 flex-1 rounded-xl text-white px-3 py-1 text-sm ml-3">LOW</span>
                                            @break
                                        @default

                                    @endswitch
                                </td>
                                <td>
                                    @switch($request->status)
                                    @case('pending')
                                        <span class="bg-yellow-500 h3 w-max rounded-xl text-white px-3 py-1 ml-8">Dalam Proses</span>
                                        @break
                                    @case('selesai')
                                    <span class="bg-green-500 h3 w-max rounded-xl text-white px-3 py-1 ml-14">Selesai</span>
                                        @break
                                    @case('ditolak')
                                    <span class="bg-red-500 h3 w-max rounded-xl text-white px-3 py-1 ml-14">Ditolak</span>
                                    @break
                                    @default

                                @endswitch
                                </td>
                                <td class="px-10 py-2 text-center">
                                    <div class="flex px-3">
                                        <a href="{{ route('admin.request.show', $request->id) }}" class="w-7 h-7 rounded-full bg-gray-600 p-1 mx-1"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" class="text-white" fill="white" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            viewBox="0 0 50 50" xml:space="preserve">
                                       <g id="Layer_1">
                                           <path d="M7,31c3.309,0,6-2.691,6-6s-2.691-6-6-6s-6,2.691-6,6S3.691,31,7,31z M7,21c2.206,0,4,1.794,4,4s-1.794,4-4,4s-4-1.794-4-4
                                               S4.794,21,7,21z"/>
                                           <path d="M19,25c0,3.309,2.691,6,6,6s6-2.691,6-6s-2.691-6-6-6S19,21.691,19,25z M29,25c0,2.206-1.794,4-4,4s-4-1.794-4-4
                                               s1.794-4,4-4S29,22.794,29,25z"/>
                                           <path d="M43,19c-3.309,0-6,2.691-6,6s2.691,6,6,6s6-2.691,6-6S46.309,19,43,19z M43,29c-2.206,0-4-1.794-4-4s1.794-4,4-4
                                               s4,1.794,4,4S45.206,29,43,29z"/>
                                       </g>
                                       <g>
                                       </g>
                                       </svg>
                                       </a>
                                        <button id="{{$request->id}}" onclick="destroy(this.id)" value="" class="w-7 h-7 rounded-full bg-red-600 p-1"><svg class="text-white" fill="white" stroke="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/></svg></button>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <div class="bg-red-500 text-white text-center p-3 rounded-sm shadow-md">
                                Data Belum Tersedia!
                            </div>
                        @endforelse
                    </tbody>
                </table>
                @if ($requests->hasPages())
                    <div class="bg-white p-3">
                        {{ $requests->links('vendor.pagination.tailwind') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
<script>
    //ajax delete
// const id = document.getElementById('delete').getAttribute('value')
// document.getElementById("delete").addEventListener("click", function() {
//   destroy(id)
// });

function destroy(id) {
        const token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'APAKAH KAMU YAKIN ?',
            text: "INGIN MENGHAPUS DATA INI!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'BATAL',
            confirmButtonText: 'YA, HAPUS!',
        }).then((result) => {
            if (result.isConfirmed) {
                //ajax delete
                jQuery.ajax({
                    url: `/admin/request/${id}`,
                    data: {
                        "id": id,
                        "_token": token
                    },
                    type: 'DELETE',
                    success: function (response) {
                        if (response.status == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'BERHASIL!',
                                text: 'DATA BERHASIL DIHAPUS!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'GAGAL!',
                                text: 'DATA GAGAL DIHAPUS!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        })
    }


</script>


@endsection
