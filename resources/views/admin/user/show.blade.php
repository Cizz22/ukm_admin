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
                    {{$user->name}}
                </p>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">
                    Email
                </p>
                <p>
                    {{$user->email}}
                </p>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <p class="text-gray-600">
                    Jumlah Laporan
                </p>
                <p>
                    {{$user->request->count()}} Laporan
                </p>
            </div>
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                <p class="text-gray-600">
                    Avatar
                </p>

                <div class="container py-2 px-2 ">
                    <img class="border-2 px-2 py-2 rounded-md w-1/4 max-w-sm" src="{{asset($user->avatar)}}" alt="">
                    </div>

                </div>
            </div>

    </div>
    <!-- support me by buying a coffee -->
</div>

@endsection
