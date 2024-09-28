@extends('layouts.app')

@section('title')
    {{ $product->name }}
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

<!-- Hiển thị thông báo thêm vào giỏ hàng thành công -->
@if(session('success'))
    <div class="bg-green-500 text-white px-4 py-2 rounded my-4">
        {{ session('success') }}
    </div>
@endif

<div class="oneColContent flex flex-wrap mx-auto py-8 max-w-6xl">
    <div class="woocommerce-notices-wrapper mb-4 w-full"></div>

    <!-- Product Image Section -->
    <div class="w-full md:w-1/2 lg:w-1/2 mb-6 md:mb-0">
        <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images images" data-columns="4" style="opacity: 1;">
            <div class="woocommerce-product-gallery__wrapper">
                <div class="woocommerce-product-gallery__image">
                    <a href="{{ $product->image_url }}">
                        <img width="530" height="530" src="{{ asset('images/' . $product->image_url) }}" 
                             class="wp-post-image object-cover w-[530px] h-[530px]" 
                             alt="{{ $product->name }}" 
                             title="{{ $product->name }}"
                             decoding="async" 
                             fetchpriority="high" 
                             sizes="(max-width: 530px) 100vw, 530px" />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Summary Section -->
    <div class="w-full md:w-1/2 lg:w-1/2" style="color: rgb(148, 83, 5);">
        <h1 class="product_title entry-title text-3xl font-bold mb-4">{{ $product->name }}</h1>
        <p class="price text-2xl text-gray-800 mb-4">
            ${{ $product->price }}
        </p>

        <div class="woocommerce-product-details__short-description text-gray-700 mb-4">
            <p>{{ $product->description }}</p>
        </div>

        <!-- Add to Cart Form -->
        <form action="{{ route('cart.add', $product->product_id) }}" method="get" class="variations_form cart mb-4">
            <div class="single_variation_wrap">
                <div class="woocommerce-variation-add-to-cart variations_button mb-4">
                    <button type="submit" style="background-color: rgb(110, 84, 60);" 
                    class="single_add_to_cart_button button alt text-white bg-brown-700 py-2 px-4 rounded hover:bg-brown-800 transition duration-300 flex-shrink-0">
                        ADD TO CART
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
