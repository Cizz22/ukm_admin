@extends('layouts.app', ['title' => 'User - Page Admin'] , ['page' => 'Daftar Pembeli'])

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
                            <th class="px-16 py-2">
                                <span class="text-white">ACTION</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-200">
                        @forelse($users['data'] as $user)
                            <tr class="border bg-white">
                                <td class="px-16 py-2">
                                    {{ $user['name'] }}
                                </td>
                                <td class="px-16 py-2">
                                    {{ $user['email'] }}
                                </td>
                                <td class="px-10 py-2 text-center">
                                    <div class="flex w-full justify-center px-3">
                                        <a href="{{ route('admin.user.show', $user['id']) }}" class="w-7 h-7 rounded-full bg-gray-600 p-1 mx-1"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" class="text-white" fill="white" xmlns:xlink="http://www.w3.org/1999/xlink"
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
                                        {{-- <button id="{{$user->id}}" onclick="destroy(this.id)" value="" class="w-7 h-7 rounded-full bg-red-600 p-1"><svg class="text-white" fill="white" stroke="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/></svg></button> --}}
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
            </div>
        </div>
    </div>
</main>


@endsection
