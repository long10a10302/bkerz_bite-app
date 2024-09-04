<!-- resources/views/admin/categories.blade.php -->
@extends('layouts.admin')

@section('title', 'Category')


@section('content')
@auth
<div class="flex-1 p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">List Category</h1>
        <div class="flex items-center space-x-4">
            <p class="text-lg">Hello, {{ Auth::user()->full_name }}</p>
        </div>
    </div>

    <!-- Nút Insert -->
    <div class="mb-6">
        <a href="{{ route('add')}}" class="text-blue-500 hover:text-blue-700 mr-2">Sửa</a>
    </div>

    <!-- Category Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow">
            <thead class="bg-blue-800 text-white">
                <tr>
                    <th class="py-2 px-4 text-left">Tên danh mục bánh</th>
                    <th class="py-2 px-4 text-left">Miêu tả danh mục bánh</th>
                    <th class="py-2 px-4 text-left">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr class="border-b">
                    <td class="py-2 px-4">{{$category->category_name}}</td>
                    <td class="py-2 px-4 overflow-hidden line-clamp-1">{{$category->description}}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('admin.category.edit', ['id' => $category->category_id]) }}" class="text-blue-500 hover:text-blue-700 mr-2">Sửa</a>
                        <a href="#" class="text-red-500 hover:text-red-700">Xóa</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div id="categoryModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-2xl font-bold mb-4">Create Category</h2>
            <form action="{{ route('admin.category.create') }}" method="POST">
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
                    <input type="file" name="img_url" id="img_url">
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="button" id="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Cancel</button>
                    <button type"submit" class="bg-blue-500 =text-white px-4 py-2 rounded hover:bg-blue-700">Add Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@else
<div class="flex-1 p-6 text-center">
    <h1 class="text-3xl font-bold mb-6">Unauthorized Access</h1>
    <p>You are not authorized to access this page.</p>
</div>
@endauth
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const openModalBtn = document.getElementById('openModal');
        const closeModalBtn = document.getElementById('closeModal');
        const modal = document.getElementById('categoryModal');

        openModalBtn.addEventListener('click', function() {
            modal.classList.remove('hidden');
        });

        closeModalBtn.addEventListener('click', function() {
            modal.classList.add('hidden');
        });

        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });
    });
</script>
@endsection