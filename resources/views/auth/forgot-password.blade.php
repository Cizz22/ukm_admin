@extends('layouts.auth',["title" => "Forget Password-Page Admin"])

@section('content')
    <div class="flex h-screen justify-center items-center bg-gray-300 px-6">
        <div class="w-full max-w-sm bg-white p-3 rounded-md shadow-md">
            <div class="flex justify-center items-center">
                <span class="text-gray-600 font-bold text-2xl">Reset Password</span>
            </div>

            @if (session('status'))
            <div class="bg-green-500 p-3 rounded-md shadow-sm mt-3">
                {{ session('status') }}
            </div>
            @endif

            <form class="mt-2" method="POST" action="{{route('password.email')}}">
                @csrf
                <label class="block">
                    <span class="text-gray-700 text-sm">Email</span>
                    <input type="email" name="email" placeholder="Alamat Email" class="form-text mt-1 block w-full rounded-md focus:outline-none">
                </label>
                @error('email')
                <div class="inline-flex max-w-sm w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                    <div class="px-4 py-2">
                        <p class="text-gray-600 text-sm">{{ $message }}</p>
                    </div>
                </div>
                @enderror

                <div class="mt-6">
                    <button type="submit" class="block w-full py-2 px-4 text-white text-center rounded-md bg-indigo-600 hover:bg-indigo-900 outline-none">Reset</button>
                </div>
            </form>
        </div>
    </div>

@endsection
