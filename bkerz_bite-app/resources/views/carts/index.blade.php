{{-- resources/views/cart.blade.php --}}
@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Giỏ hàng của bạn</h1>

    {{-- Kiểm tra xem giỏ hàng có sản phẩm hay không --}}
    @if(session('cart') && count(session('cart')) > 0)
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-left">Sản phẩm</th>
                    <th class="py-2 px-4 border-b text-right">Giá</th>
                    <th class="py-2 px-4 border-b text-center">Số lượng</th>
                    <th class="py-2 px-4 border-b text-right">Tổng cộng</th>
                    <th class="py-2 px-4 border-b text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach(session('cart') as $item)
                    <tr>
                        {{-- Hình ảnh và tên sản phẩm --}}
                        <td class="py-4 px-4 border-b">
                            <div class="flex items-center">
                                <img src="" alt="{{ $item['name'] }}" class="w-20 h-20 object-cover mr-4">
                                <span class="text-lg font-semibold">{{ $item['name'] }}</span>
                            </div>
                        </td>

                        {{-- Giá sản phẩm --}}
                        <td class="py-4 px-4 border-b text-right">
                            {{ number_format($item['price']) }} VND
                        </td>

                        {{-- Số lượng sản phẩm --}}
                        <td class="py-4 px-4 border-b text-center">
                            {{ $item['quantity'] }}
                        </td>

                        {{-- Tổng giá cho mỗi sản phẩm --}}
                        <td class="py-4 px-4 border-b text-right">
                            {{ number_format($item['price'] * $item['quantity']) }} VND
                        </td>

                        {{-- Thao tác (xóa sản phẩm) --}}
                        <td class="py-4 px-4 border-b text-center">
                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Phần thanh toán --}}
        <div class="mt-8 text-right">
            <a href="{{ route('checkout') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Thanh toán</a>
        </div>
    @else
        <p class="text-gray-600">Giỏ hàng của bạn đang trống.</p>
    @endif
</div>
@endsection
