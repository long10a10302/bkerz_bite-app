@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Your Cart</h1>

    @if(isset($message))
        <p class="text-red-500">{{ $message }}</p>
    @else
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border-b">Product Name</th>
                    <th class="py-2 px-4 border-b">Quantity</th>
                    <th class="py-2 px-4 border-b">Price</th>
                    <th class="py-2 px-4 border-b">Total Price</th>
                    <th class="py-2 px-4 border-b">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItem as $item)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ $item->product->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->quantity }}</td>
                        <td class="py-2 px-4 border-b">${{ number_format($item->product->price, 2) }}</td>
                        <td class="py-2 px-4 border-b">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                        <td class="py-2 px-4 border-b">
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Hiển thị tổng tiền giỏ hàng -->
        <p class="mt-4 font-bold">
            <strong>Total: </strong> ${{ number_format($cartItem->sum(fn($item) => $item->product->price * $item->quantity), 2) }}
        </p>

        <a href="" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Proceed to Checkout</a>
    @endif
</div>
@endsection
