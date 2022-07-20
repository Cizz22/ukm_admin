@extends('layouts.app', ['title' => 'User Detail - Page Admin'], ['page' => 'Detail Pengguna'])

@section('content')
<div class="min-h-screen flex overflow-x-hidden overflow-y-auto py-6 px-8 bg-gray-300 items-start">
    <div class="bg-white w-full rounded-lg shadow-xl">
        <div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">
                    Nama
                </p>
                <p class="flex flex-col">
                    {{$user['name']}}
                </p>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">
                    Email
                </p>
                <p>
                    {{$user['email']}}
                </p>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">
                    Whatsapp
                </p>
                <p>
                    {{$user['whatsapp']}}
                </p>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">
                    Bank No
                </p>
                <p>
                    {{$user['payment_no']}}
                </p>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">
                    Code Ref
                </p>
                <p>
                    Tidak Ada
                </p>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                <p class="text-gray-600">
                    Bukti Pembayaran
                </p>

                <div class="container py-2 px-2 ">
                   <a href="{{env('API_URL')}}/{{$user['payment_proof']}}" target="_blank">
                       <img class="border-2 px-2 py-2 rounded-md w-1/4 max-w-sm" src="{{env('API_URL_')}}{{$user['payment_proof']}}" alt="">
                   </a>
                    </div>

                </div>
            </div>

    </div>
    <!-- support me by buying a coffee -->
</div>

@endsection
