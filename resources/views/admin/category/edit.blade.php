@extends('layouts.app', ['title' => 'Edit - Admin Page'], ['page' => 'Edit Kategori'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="mx-auto container py-6 px-8">
            <div class="p-6 bg-white rounded-md shadow-md">
                <div><span class="font-bold text-gray-600 text-2xl">Edit Category</span></div>
                <hr class="mt-2 mb-4">
                <form action="{{ route('admin.category.update', $category_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label class="block" for="">
                        <span class="text-gray-700 font-semibold">Category Name</span>
                        <input type="text" name="name" class="bg-gray-100 outline-none form-input mt-1 block w-full rounded-md focus:bg-white" id="">
                        @error('name')
                            <div class="w-full bg-red-300 shadow-md rounded-md overflow-hidden mt-2">
                                <div class="px-4 py-2">
                                    <p class="text-gray-600 text-sm">{{$message}}</p>
                                </div>
                            </div>
                        @enderror
                    </label>

                    <label class="block mt-2" for="">
                        <span class="text-gray-700 font-semibold">Detail</span>
                        <textarea type="text" name="detail" class=" bg-gray-100 form-input mt-1 p-3 block w-full rounded-md focus:bg-white" id=""></textarea>
                        @error('detail')
                        <div class="w-full bg-red-300 shadow-md rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{$message}}</p>
                            </div>
                        </div>
                    @enderror
                    </label>

                    <div class="mt-3">
                        <button class="bg-indigo-500 rounded-md px-4 py-2 hover:outline-none text-white">Submit</button>
                    </div>
                </form>
            </div>
    </div>
</main>
@endsection
