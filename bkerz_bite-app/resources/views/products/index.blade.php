@extends('layouts.app')

@section('title')

@endsection

@section('content')
<section class="relative text-center">
    <img class="w-full h-80 object-cover" src="https://bakerynouveau.com/wp-content/uploads/2016/02/pastries_hm.jpg" alt="Overhead view of variety pastry">
    <h1 class="absolute top-1/3 w-full text-white font-bold text-5xl">Online Shop</h1>
    <h2 class="absolute top-1/2 w-full text-white font-semibold text-3xl">MENU</h2>
</section>

<!-- Store Notice Section -->
<div class="text-left py-4 px-4 border-2 mt-6 mx-auto w-full max-w-6xl" style="border-color: rgb(148, 83, 5);">
    <p class="text-base mb-1" style="color: rgb(148, 83, 5);">
        Please note that online orders require 48 hours notice starting on 
        <strong class="text-red-700">THE NEXT DAY WE ARE OPEN FOR BUSINESS</strong>. (Remember, we are closed Mondays & Tuesdays.)
    </p>
    <p class="text-base mb-1" style="color: rgb(148, 83, 5);">
        <strong class="text-red-700">ORDERS MUST BE RECEIVED BEFORE</strong> 4:00 PM Wednesday – Sunday ONLY.
    </p>
    <p class="text-base" style="color: rgb(148, 83, 5);">
        If you would like to coordinate a larger special order, please call any one of the shops to inquire about availability.
    </p>
</div>

<!-- Product Listing Section -->
<div class="max-w-6xl mx-auto py-8 text-left">
    <!-- Category Title and Result Count -->
    <p class="woocommerce-result-count text-gray-700 text-lg mb-4">
        (Showing all {{ $products->count() }} results)
    </p>

    <!-- Product Grid -->
    <ul class="products grid grid-cols-3 gap-6">
        @foreach ($products as $product)
        <li class="product bg-white shadow-none overflow-hidden text-left">
            <a href="{{ route('products.show', $product->product_id) }}" class="block">
                <img src="{{ asset('images/' . $product->image_url) }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-64 object-cover"
                     loading="lazy" />
                <h2 class="woocommerce-loop-product__title text-xl mt-4 " style="color: rgb(110, 84, 60);">{{ $product->name }}</h2>
                <span class="price block text-gray-800 text-lg mt-2 " style="color: rgb(110, 84, 60);">
                    ${{ number_format($product->price, 2) }}
                </span>
            </a>
            <a href="{{ route('cart.add', $product->product_id) }}" 
                data-quantity="1" 
                class="block text-center text-white rounded py-3 mt-4 hover:bg-opacity-90 transition duration-300" 
                style="background-color: rgb(110, 84, 60);"
                aria-label="Add to cart: “{{ $product->name }}”" 
                rel="nofollow">Add to Cart</a>
        </li>
        @endforeach
    </ul>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $products->links() }} <!-- Thêm dòng này để hiển thị phân trang -->
    </div>
</div>

@endsection
