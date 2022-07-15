@extends('layouts.app', ['title' => 'Verifikasi Pembayaran - Page Admin'] , ['page' => 'Verifikasi Pembayaran'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto py-6 px-8">

        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow-sm rounded-lg overflow-hidden">
                <table class="min-w-full table-auto">
                    <thead class="justify-between">
                        <tr class="bg-gray-600 w-full">
                            <th class="px-16 py-2 text-left ">
                                <span class="text-white">NAME</span>
                            </th>
                            <th class="px-16 py-2 text-left ">
                                <span class="text-white">EMAIL</span>
                            </th>
                            <th class="px-16 py-2 text-left ">
                                <span class="text-white">TIPE TIKET</span>
                            </th>
                            <th class="px-16 py-2 text-left ">
                                <span class="text-white">BUKTI PEMBAYARAN</span>
                            </th>
                            <th class="px-16 py-2">
                                <span class="text-white">ACTION</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-200">
                        @forelse($requests as $user)
                            <tr class="border bg-white">
                                <td class="px-16 py-2">
                                    {{ $user['name'] }}
                                </td>
                                <td class="px-16 py-2">
                                    {{ $user['email'] }}
                                </td>
                                <td class="px-16 py-2">
                                   Presale 1
                                </td>
                                <td class="px-10 py-2 text-center">
                                    <div class="flex w-full justify-center px-3">
                                        <a href="{{env('API_URL_')}}{{$user['payment_proof']}}" target="_blank" class="w-7 h-7 rounded-full bg-gray-600 p-1 mx-1">

                                            <svg class="text-white" fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M144 480C64.47 480 0 415.5 0 336C0 273.2 40.17 219.8 96.2 200.1C96.07 197.4 96 194.7 96 192C96 103.6 167.6 32 256 32C315.3 32 367 64.25 394.7 112.2C409.9 101.1 428.3 96 448 96C501 96 544 138.1 544 192C544 204.2 541.7 215.8 537.6 226.6C596 238.4 640 290.1 640 352C640 422.7 582.7 480 512 480H144zM303 392.1C312.4 402.3 327.6 402.3 336.1 392.1L416.1 312.1C426.3 303.6 426.3 288.4 416.1 279C407.6 269.7 392.4 269.7 383 279L344 318.1V184C344 170.7 333.3 160 320 160C306.7 160 296 170.7 296 184V318.1L256.1 279C247.6 269.7 232.4 269.7 223 279C213.7 288.4 213.7 303.6 223 312.1L303 392.1z"/></svg>

                                       </a>
                                        {{-- <button id="{{$user->id}}" onclick="destroy(this.id)" value="" class="w-7 h-7 rounded-full bg-red-600 p-1"><svg class="text-white" fill="white" stroke="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/></svg></button> --}}
                                    </div>
                                </td>
                                <td class="px-10 py-2 text-center">
                                    <div class="flex w-full justify-center px-3 gap-2">
                                        <a href="{{ route('admin.request.show', $user['id']) }}" class="w-7 h-7 rounded-full bg-gray-600 p-1 mx-1"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" class="text-white" fill="white" xmlns:xlink="http://www.w3.org/1999/xlink"
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
                                        <button onclick="approve()"  class="w-7 h-7 rounded-full bg-green-600 p-1"><svg class="text-white" fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z"/></svg></button>

                                        <button id="{{$user['id']}}" onclick="reject()"  class="w-7 h-7 rounded-full bg-red-600 p-1"><svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 80 320 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/></svg></button>

                                    </div>
                                    <form action="{{route('admin.verifikasi', $user['id'])}}" method="POST" id="approve">
                                        @csrf
                                        <input type="hidden" name="tipe" value="accept">
                                    </form>
                                    <form method="POST" action="{{route('admin.verifikasi', $user['id'])}}" id="reject">
                                        @csrf
                                        <input type="hidden" name="tipe" value="reject">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="bg-red-500 text-white text-center p-3 rounded-sm shadow-md">
                                Data Belum Tersedia!
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script>
function approve(id) {
        const token = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
            title: 'APAKAH KAMU YAKIN ?',
            text: "VERIFIKASI PEMABAYARAN DITERIMA",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'BATAL',
            confirmButtonText: 'YA!',
        }).then((result) => {
            if (result.isConfirmed) {
                //ajax delete
                $('#approve').submit()
            }
        })
    }

    function reject(id) {
        const token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'APAKAH KAMU YAKIN ?',
            text: "VERIFIKASI DITOLAK",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'BATAL',
            confirmButtonText: 'YA!',
        }).then((result) => {
            if (result.isConfirmed) {
                //ajax delete
                $('#reject').submit()
            }
        })
    }

</script>
@endsection
