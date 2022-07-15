@extends('layouts.app', ['title' => 'Show - Page Admin'], ['page' => 'Detail Laporan'])


@section('content')
    <!-- component -->
    <!-- This is an example component -->
    <div class="min-h-screen flex overflow-x-hidden overflow-y-auto py-6 px-8 bg-gray-300 items-start">
        <div class="bg-white w-full rounded-lg shadow-xl">
            <div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Nama
                    </p>
                    <p class="flex flex-col">
                        {{ $request['name'] }}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Email
                    </p>
                    <p>
                        {{ $request['email'] }}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Whatsapp
                    </p>
                    <p>
                        {{ $request['whatsapp'] }}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Bank No
                    </p>
                    <p>
                        {{ $request['bank_no'] }}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Code Ref
                    </p>
                    <p>
                        {{ $request['code_ref'] ? $request['code_ref'] : 'Tidak Ada' }}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                    <p class="text-gray-600">
                        Bukti Pembayaran
                    </p>

                    <div class="container py-2 px-2 ">
                        <a href="{{ env('API_URL_') }}{{ $request['payment_proof'] }}" target="_blank">
                            <img class="border-2 px-2 py-2 rounded-md w-1/4 max-w-sm"
                                src="{{ env('API_URL_') }}{{ $request['payment_proof'] }}" alt="">
                        </a>
                    </div>

                </div>
            </div>

            <div id="" class="p-10 flex justify-end w-full overflow-hidden">
                <button id="approve" value="{{$request['id']}}"
                    class="bg-green-600 text-white px-4 py-2 rounded-md mx-2">Verifikasi Diterima</button>
                <button id="reject" value="{{$request['id']}}"
                    class="bg-red-600 text-white px-4 py-2 rounded-md mx-2">Verifikasi Diterima</button>
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
                            'tipe': 'accept'
                        },
                        type: 'PUT',
                        success: function(response) {
                            if (response.status == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'BERHASIL!',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'GAGAL!',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        },
                        error: function(xhr, tst, err) {
                           console.log(xhr);
                        },
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
                            'tipe': 'reject'
                        },
                        type: 'PUT',
                        success: function(response) {
                            if (response.status == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'BERHASIL!',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'GAGAL!',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
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
