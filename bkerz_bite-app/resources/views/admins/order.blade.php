@extends('layouts.admin')

@section('title', 'Category')

@section('content')
@auth
<div class="flex">
    <!-- Main Content Area -->
    <div class="flex-1 p-6 overflow-y-auto max-h-screen">
        <header class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">List Category</h1>
            <p class="text-lg">Hello, {{ Auth::user()->full_name }}</p>
        </header>


        <!-- Category Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead class="bg-blue-800 text-white">
                    <tr>
                        <th class="py-2 px-4 text-left">Mã đơn hàng</th>
                        <th class="py-2 px-4 text-left">Thông tin khách hàng</th>
                        <th class="py-2 px-4 text-left">Địa chỉ nhận hàng</th>
                        <th class="py-2 px-4 text-left">Trạng thái đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $order->id}}</td>
                        <td class="py-2 px-4">{{ $order->user->email}}</td>
                        <td class="py-2 px-4">{{ $order->shipping_address}}</td>
                        <td class="py-2 px-4 overflow-hidden">
                            <form action="{{ route('admin.order.updateOrder', $order->id) }}" method="POST" id="order-status-form">
                                @csrf
                                @method('PUT')

                                <select name="status" id="orderStatus" class="border border-gray-300 rounded">
                                    @if ($order->status == 'Đã giao')
                                    <option value="Đã giao" selected>Đã giao</option>
                                    @elseif ($order->status == 'Đã hủy')
                                    <option value="Đã hủy" selected>Đã hủy</option>
                                    @else
                                    <option value="Đang xử lý" {{ $order->status == 'Đang xử lý' ? 'selected' : '' }}>Đang xử lý</option>
                                    <option value="Đã giao" {{ $order->status == 'Đã giao' ? 'selected' : '' }}>Đã giao</option>
                                    <option value="Đã hủy" {{ $order->status == 'Đã hủy' ? 'selected' : '' }}>Đã hủy</option>
                                    @endif
                                </select>
                                <button type="submit" class="ml-2 bg-blue-500 text-white rounded p-1">Cập nhật</button>
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