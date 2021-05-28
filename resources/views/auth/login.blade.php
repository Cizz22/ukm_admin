@extends('layouts.auth', ['title' => 'Login-Page Admin'])

@section('content')
    <div class="flex justify-center items-center h-screen bg-gray-300 px-6">
        <div class="p-6 max-w-sm w-full bg-white shadow-md rounded-md">
            <div class="flex justify-center item-center">
                <span class="text-gray-600 font-bold text-2xl">Login</span>
            </div>
            @if(session('status'))
                <div class="bg-green-500 p-3 rounded-md shadow-sm mt-3">
                    {{session('status')}}
                </div>
            @endif

            <form class="mt-3" action="{{route('login')}}" method="POST">
                @csrf
                <label class="block">
                    <span class="text-gray-700 text-sm">Email</span>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-input mt-1 block w-full rounded-md focus:outline-none" placeholder="Alamat Email">
                    @error('email')
                    <div class="inline-flex max-w-sm w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                        </div>
                    </div>
                    @enderror
                </label>

                <label class="block">
                    <span class="text-gray-700 text-sm">Password</span>
                    <input type="password" name="password" class="form-input mt-1 block w-full rounded-md focus:outline-none" placeholder="Password">
                    @error('password')
                    <div class="inline-flex max-w-sm w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{ $message }}</p>
                        </div>
                    </div>
                    @enderror
                </label>

                <div class="justify-between flex items-center mt-2">
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox text-indigo-600">
                            <span class="text-gray-600 text-sm mx-1">Ingatkan Saya</span>
                        </label>
                    </div>

                    <div>
                        <a class="block text-sm fontme text-indigo-600 hover:underline" href="/forgot-password">Lupa Password?</a>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-indigo-600 w-full rounded-md text-white py-2 px-4 hover:bg-indigo-700">Login</button>
                </div>
            </form>
        </div>
    </div>

@endsection
