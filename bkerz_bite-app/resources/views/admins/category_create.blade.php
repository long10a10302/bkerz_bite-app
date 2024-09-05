@extends('layouts.admin')

@section('title', 'Cakes')

@section('content')

@auth
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-4">Create Category</h2>
        <form action="{{ route('admin.category.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="category_name" class="block text-gray-700 text-sm font-bold mb-2">Category Name</label>
                <input type="text" id="category_name" name="category_name" class="form-input w-full">
                @error('category_name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea id="description" name="description" class="form-textarea w-full"></textarea>
            </div>
            <div class="mb-4">
                <label for="img_url" class="block text-gray-700 text-sm font-bold mb-2">Img</label>
                <input type="file" id="img_url" name="img_url" class="form-input w-full">
            </div>

            <div class="flex justify-end space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add Category</button>
            </div>
        </form>
    </div>
</div>

@else
<div class="flex-1 p-6 text-center">
    <h1 class="text-3xl font-bold mb-6">Unauthorized Access</h1>
    <p>You are not authorized to access this page.</p>
</div>
@endauth
@endsection