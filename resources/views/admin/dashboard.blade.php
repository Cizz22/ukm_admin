@extends('layouts.app',["title" => "Dashboard-Page Admin"], ['page' => 'Dashboard'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">

        <div class="mt-4">
            <div class="flex flex-wrap-mx-6">
                <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                    <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                        <div class="p-3 rounded-full bg-blue-600 bg-opacity-75">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        </div>
                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">{{$request_total}}</h4>
                            <div class="text-gray-500">LAPORAN TOTAL</div>
                        </div>
                    </div>
                </div>

                <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                    <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                        <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">{{$request_pending}}</h4>
                            <div class="text-gray-500">DALAM PROSES</div>
                        </div>
                    </div>
                </div>

                <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                    <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                        <div class="p-3 rounded-full bg-red-600 bg-opacity-75">
                            <svg class="w-8 h-8 text-white" fill="white" stroke="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm1.41-1.41A8 8 0 1 0 15.66 4.34 8 8 0 0 0 4.34 15.66zm9.9-8.49L11.41 10l2.83 2.83-1.41 1.41L10 11.41l-2.83 2.83-1.41-1.41L8.59 10 5.76 7.17l1.41-1.41L10 8.59l2.83-2.83 1.41 1.41z"/></svg>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">{{$request_reject}}</h4>
                            <div class="text-gray-500">TERTOLAK</div>
                        </div>
                    </div>
                </div>

                <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                    <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                        <div class="p-3 rounded-full bg-green-600 bg-opacity-75">

                            <svg class="w-8 h-8 text-white" fill="white" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM6.7 9.29L9 11.6l4.3-4.3 1.4 1.42L9 14.4l-3.7-3.7 1.4-1.42z"/></svg>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">{{$request_success}}</h4>
                            <div class="text-gray-500">LAPORAN SELESAI</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-h-screen h-4/5 flex overflow-x-hidden overflow-y-auto py-6 px-8 bg-gray-300 items-start">
        <div class="bg-white w-full rounded-lg container h-full overflow-hidden mx-12 -mt-2">
            <div class="grid grid-rows-4 grid-cols-4  h-full ">
                <div class="row-span-5 col-span-3 px-4 py-4">
                    <div class="p-4 border-b mb-3">
                        <h2 class="text-2xl ">
                            Wilayah Terlapor
                        </h2>
                        <div class="flex justify-between">
                            <p class="text-sm text-gray-500">
                            </p>
                           <div class="flex justify-between">
                                <div class="flex mx-3">
                                    <span class="bg-red-500 w-6 h-6 text-red-500 rounded-full">.</span>
                                    <span class="mx-1"> Sumber Laporan</span>
                                </div>
                                <div class="flex mx-3">
                                    <span class="bg-green-500 w-6 h-6 text-green-500 rounded-full">.</span>
                                    <span class="mx-1">Laporan Selesai</span>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="max-h-screen h-full mb-3 px-1">
                        <div id="map" class="p-7 m-5 h-5/6 flex-1 rounded-md ">
                        </div>
                    </div>

                </div>
                <div class="row-span-1 border-2">
                    <div class="flex flex-col h-full max-h-sm justify-center items-center">
                        <span class="text-md font-bold text-md text-gray-400">Laporan selesai di kota Surabaya</span>
                        <span class="text-xl font-bold">{{$request_success}}</span>
                    </div>
                </div>
                <div class="row-span-1 border-2">
                 <div class="flex flex-col h-full max-h-sm justify-center items-center">
                    <span class="text-md font-bold text-md text-gray-400">Rata - rata waktu penerimaan laporan</span>
                    <span class="text-xl font-bold">3 m</span>
                        </div>
                </div>
                <div class="row-span-1 border-2">
                <div class="flex flex-col h-full max-h-sm justify-center items-center">
                    <span class="text-md font-bold text-md text-gray-400">Rata - rata waktu penyelesaian laporan</span>
                    <span class="text-xl font-bold">Angka</span>
                </div>
                </div>
                <div class="row-span-1 border-2">
                <div class="flex flex-col h-full max-h-sm justify-center items-center">
                    <span class="text-md font-bold text-md text-gray-400">Efektivitas Laporan</span>
                    <span class="text-xl font-bold">82%</span>
                </div>
                </div>
              </div>

            </div>
        </div>
        <!-- support me by buying a coffee -->
    </div>

    <script>
        const map = L.map('map').setView([-7.250445, 112.768845], 11);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '<a>&copy; <a href="https://www.openstreetmap.org/copyright">Openstreetmap</a> contributors</a>'
        }).addTo(map);
    </script>
</main>
@endsection
