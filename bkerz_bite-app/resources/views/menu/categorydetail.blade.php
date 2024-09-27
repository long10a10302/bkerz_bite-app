@extends('layouts.app')

@section('title')
{{ $category->category_id }}
@endsection

@section('content')

<main>
    <!-- Page Banner -->
    <section id="pageBanner" class="relative text-center">
        <img class="w-full h-auto" src="{{ asset('images/' . $category->img_url) }}"
            alt="{{ $category->category_name }}">
        <h2 class="absolute top-[40%] left-1/2 transform -translate-x-1/2 text-white text-2xl bg-opacity-50 shadow-lg">
            {{ $category->category_name }}
        </h2>
    </section>

    <!-- Content Section -->
    <section id="pageBanner"
        class="relative text-left bg-gradient-to-r from-yellow-50 via-white to-yellow-50 py-8 px-12">
        <h1 class="text-black text-4xl font-bold mb-2">
            {{ $category->category_name }}
        </h1>
        <h2 class="text-black text-xl mb-6">
            {{ $category->description }}
        </h2>

        <!-- Gallery Slider -->
        <div class="flex flex-wrap justify-start gap-4">
            @foreach ($products as $product)
                <div class="flex-shrink-0 w-28 lg:w-32 xl:w-36">
                    <a href="{{ route('products.show', $product->product_id) }}">
                        <img src="{{ asset('images/' . $product->image_url) }}" alt="{{ $product->name }}"
                            class="w-full h-32 object-cover rounded-md shadow-md">
                    </a>
                    <div class="mt-2 text-center">
                        <a href="{{ route('products.show', $product->product_id) }}"
                            class="text-sm font-medium text-blue-600 hover:underline">
                            {{ $product->name }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
      
    </section>

    <!-- Separator -->
    <div class="border-t border-gray-300 my-6"></div>

    <!-- Product Info Section -->
    <div class="flex flex-col lg:flex-row justify-between mb-8 px-10">
        <div class="lg:w-full">
            <a href="{{ route('product.index', $category->category_id) }}">
                <button class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded mt-4">
                    View All Products
                </button>
            </a>
        </div>
    </div>
</main>

@endsection
