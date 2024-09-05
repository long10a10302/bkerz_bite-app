@extends('layouts.admin')

@section('title', 'Update Cake')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-4">Update Cake</h2>
        <form action="{{route('admin.cake.update',$cake->product_id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input type="text" id="name" name="name" class="form-input w-full" value="{{$cake->name}}" required>
                @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea id="description" name="description" class="form-textarea w-full" required>{{  $cake->description }}</textarea>
                @error('description')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                <input type="number" id="price" name="price" class="form-input w-full" step="0.01" value="{{$cake->price}}" required>
                @error('price')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category Selection -->
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                <select id="category_id" name="category_id" class="form-select w-full" required>
                    <!-- Chọn danh mục hiện tại -->
                    <option value="{{ $cake->category_id }}">{{ $cake->category->category_name }}</option>
                    <!-- Danh sách các danh mục khác -->
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image URL -->
            <div class="mb-4">
                <label for="img_url" class="block text-gray-700 text-sm font-bold mb-2">Image URL</label>
                <input type="file" id="img_url" name="img_url" class="form-input w-full">
                @error('img_url')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Update Cake</button>
            </div>
        </form>
    </div>
</div>
@endsection