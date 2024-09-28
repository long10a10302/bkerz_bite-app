@extends('layouts.app')

@section('title', 'Trạng thái Đơn hàng')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Trạng thái Đơn Hàng</h1>

    <!-- Display success message if exists -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if($orders->isEmpty())
        <p class="text-gray-600">Bạn chưa có đơn hàng nào.</p>
    @else
        <form action="{{route('orders.cancelAll')}}" method="POST" class="mb-6">
            @csrf
            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600">
                Hủy Tất Cả Đơn Hàng
            </button>
        </form>

        @foreach($orders as $order)
        <!-- Thông tin trạng thái đơn hàng -->
        <div class="bg-gray-100 p-4 rounded-lg mb-6">
            <h2 class="text-lg font-semibold text-gray-700">Mã Đơn Hàng: #{{ $order->id }}</h2>
            <p class="text-sm text-gray-600">Ngày tạo: {{ $order->created_at->format('d/m/Y') }}</p>
            <p class="text-sm text-gray-600">Trạng thái: 
                <span class="{{ $order->status == 'delivered' ? 'text-green-600' : 'text-red-600' }} font-semibold">
                    {{ $order->status}}
                </span>
            </p>
            
            <!-- Button to cancel the specific order -->
            <form action="{{route('orders.cancel',$order->id)}}" method="POST" class="mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600">
                    Hủy Đơn Hàng
                </button>
            </form>
            
        </div>

        <!-- Bảng hiển thị sản phẩm của đơn hàng -->
        <div class="overflow-x-auto mb-6">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm">
                    <tr>
                        <th class="py-3 px-4 text-left">Sản phẩm</th>
                        <th class="py-3 px-4 text-right">Số lượng</th>
                        <th class="py-3 px-4 text-right">Giá</th>
                        <th class="py-3 px-4 text-right">Tổng cộng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $detail)
                    <tr class="border-b border-gray-200">
                        <td class="py-3 px-4">{{ $detail->product->name }}</td>
                        <td class="py-3 px-4 text-right">{{ $detail->quantity }}</td>
                        <td class="py-3 px-4 text-right">{{ number_format($detail->price, 0, ',', '.') }} VND</td>
                        <td class="py-3 px-4 text-right">{{ number_format($detail->price * $detail->quantity, 0, ',', '.') }} VND</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endforeach
    @endif
</div>
@endsection
