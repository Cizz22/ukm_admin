@extends('layouts.app', ['title' => 'Show - Page Admin'], ['page' => 'Detail Laporan'])


@section('content')
<!-- component -->
<!-- This is an example component -->
<div class="min-h-screen flex overflow-x-hidden overflow-y-auto py-6 px-8 bg-gray-300 items-start">
    <div class="bg-white w-full rounded-lg shadow-xl">
        <div class="p-4 border-b">
            <h2 class="text-2xl ">
                {{$request->title}}
            </h2>
            <p class="text-sm text-gray-500">
                Informasi Pengaduan
            </p>
        </div>
        <div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">
                    Nama Pelapor
                </p>
                <a class="flex flex-col" href="{{route('admin.user.show', $request->user->id)}}">
                    <span>{{$request->user->name}}</span>
                    <span class="text-sm text-gray-300 hover:text-gray-500">Tekan Untuk Selebihnya</span>
                </a>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">
                    Kategori Laporan
                </p>
                <p>
                    {{$request->category->name}}
                </p>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">
                    Waktu Pengaduan
                </p>
                <p>
                    {{$request->created_at}}
                </p>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">
                    Alamat Pengaduan
                </p>
                <p>
                    {{$request->address}}
                </p>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">
                    Status
                </p>
                @switch($request->status)
                    @case('pending')
                        <span class="bg-yellow-500 h3 w-max rounded-xl text-white px-3 py-1">Dalam Proses</span>
                        @break
                    @case('selesai')
                    <span class="bg-green-500 h3 w-max rounded-xl text-white px-3 py-1">Selesai</span>
                        @break
                    @case('ditolak')
                    <span class="bg-red-500 h3 w-max rounded-xl text-white px-3 py-1">Ditolak</span>
                    @break
                    @default

                @endswitch

            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                <p class="text-gray-600">
                    Image
                </p>

                <div class="container py-2 px-2 ">
                        <img class="border-2 px-2 py-2 rounded-md w-full max-w-sm" src="{{asset('storage/requests/jalan.jpg')}}" alt="">
                    </div>

                </div>
            </div>

            <div id="" class="p-10 flex justify-end w-full overflow-hidden">
            @if($request->status == 'pending')
                <button value="{{$request->id}}" id="approve" class="bg-green-600 text-white px-4 py-2 rounded-md mx-2">Laporan Selesai</button>
                <button id="reject" class="bg-red-600 text-white px-4 py-2 rounded-md mx-2">Laporan Ditolak</button>
            @endif
            </div>
        </div>
    </div>
    <!-- support me by buying a coffee -->
</div>

<script>
    const id = document.getElementById('approve').getAttribute('value')
document.getElementById("approve").addEventListener("click", function() {
  approve(id)
});
document.getElementById("reject").addEventListener("click", function() {
  reject(id)
});

function approve(id) {
        const token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'APAKAH KAMU YAKIN ?',
            text: "LAPORAN TELAH DISELESAIKAN",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'BATAL',
            confirmButtonText: 'YA!',
        }).then((result) => {
            if (result.isConfirmed) {
                //ajax delete
                jQuery.ajax({
                    url: `/admin/request/${id}`,
                    data: {
                        "id": id,
                        "_token": token,
                        'tipe': 'selesai'
                    },
                    type: 'PUT',
                    success: function (response) {
                        if (response.status == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'BERHASIL!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'GAGAL!',
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

    function reject(id) {
        const token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'APAKAH KAMU YAKIN ?',
            text: "LAPORAN DITOLAK",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'BATAL',
            confirmButtonText: 'YA!',
        }).then((result) => {
            if (result.isConfirmed) {
                //ajax delete
                jQuery.ajax({
                    url: `/admin/request/${id}`,
                    data: {
                        "id": id,
                        "_token": token,
                        'tipe': 'ditolak'
                    },
                    type: 'PUT',
                    success: function (response) {
                        if (response.status == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'BERHASIL!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'GAGAL!',
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
