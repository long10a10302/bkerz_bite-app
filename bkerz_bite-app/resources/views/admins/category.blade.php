@extends('layouts.admin')

@section('title', 'Category')

@section('content')
@auth
<div class="flex flex-col items-center">
    <!-- Main Content Area -->
    <div class="flex-1 p-6 overflow-y-auto max-h-screen w-full max-w-5xl">
        <header class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">List Category</h1>
            <p class="text-lg">Hello, {{ Auth::user()->full_name }}</p>
        </header>

        <!-- Success Message -->
        @if (session('success'))
            <div class="flex items-center justify-between bg-green-500 text-white px-4 py-2 rounded mb-4 w-full max-w-lg">
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.style.display='none';" class="text-white font-bold">×</button>
            </div>
        @endif

        <!-- Insert Button -->
        <div class="mb-6 text-right">
            <a href="{{ route('admin.category.add') }}" class="text-blue-500 hover:text-blue-700">Thêm</a>
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
                        <td class="py-2 px-4">{{ $category->category_name }}</td>
                        <td class="py-2 px-4 overflow-hidden line-clamp-1">{{ $category->description }}</td>
                        <td class="py-2 px-4 flex space-x-2">
                            <a href="{{ route('admin.category.edit', $category->category_id) }}" class="text-blue-500 hover:text-blue-700">Sửa</a>
                            <form action="{{ route('admin.category.delete', $category->category_id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@else
<!-- Unauthorized Access Message -->
<div class="flex-1 p-6 text-center">
    <h1 class="text-3xl font-bold mb-6">Unauthorized Access</h1>
    <p>You are not authorized to access this page.</p>
</div>
@endauth
@endsection
