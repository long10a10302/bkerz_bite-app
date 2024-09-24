@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Total Revenue Today -->
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="font-semibold text-lg">Today's Revenue</h2>
            <p class="text-2xl text-green-500">${{ number_format($todayRevenue, 2) }}</p>
        </div>
        <!-- Total Revenue This Week -->
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="font-semibold text-lg">Weekly Revenue</h2>
            <p class="text-2xl text-green-500">${{ number_format($weeklyRevenue, 2) }}</p>
        </div>
        <!-- Total Revenue This Month -->
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="font-semibold text-lg">Monthly Revenue</h2>
            <p class="text-2xl text-green-500">${{ number_format($monthlyRevenue, 2) }}</p>
        </div>
        <!-- Total Revenue This Year -->
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="font-semibold text-lg">Yearly Revenue</h2>
            <p class="text-2xl text-green-500">${{ number_format($yearlyRevenue, 2) }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <!-- Total Orders Today -->
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="font-semibold text-lg">Today's Orders</h2>
            <p class="text-2xl">{{ $todayOrders }}</p>
        </div>
        <!-- Total Orders This Week -->
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="font-semibold text-lg">Weekly Orders</h2>
            <p class="text-2xl">{{ $weeklyOrders }}</p>
        </div>
        <!-- Total Orders This Month -->
        <div class="bg-white p-4 rounded-lg shadow">
            <h2 class="font-semibold text-lg">Monthly Orders</h2>
            <p class="text-2xl">{{ $monthlyOrders }}</p>
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow mb-6">
        <h2 class="font-semibold text-lg">Average Order Value</h2>
        <p class="text-2xl text-blue-500">${{ number_format($averageOrderValue, 2) }}</p>
    </div>

   

    <div class="bg-white p-4 rounded-lg shadow mb-6">
        <h2 class="font-semibold text-lg">Order Status Counts</h2>
        <ul class="list-disc pl-5">
            @foreach($orderStatusCounts as $statusCount)
                <li>{{ $statusCount->status }}: {{ $statusCount->count }}</li>
            @endforeach
        </ul>
    </div>

</div>


@endsection
