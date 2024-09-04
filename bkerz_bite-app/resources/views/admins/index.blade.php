@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    @auth
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Dashboard</h1>
        <div class="flex items-center space-x-4">
            <p class="text-lg">Hello {{ Auth::user()->full_name }}</p>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Total Users</h2>
            <p class="text-2xl">1,234</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Total Posts</h2>
            <p class="text-2xl">567</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Comments</h2>
            <p class="text-2xl">123</p>
        </div>
    </div>
    @else
    <div class="text-center">
        <h1 class="text-3xl font-bold mb-6">Unauthorized Access</h1>
        <p>You are not authorized to access this page.</p>
    </div>
    @endauth
@endsection