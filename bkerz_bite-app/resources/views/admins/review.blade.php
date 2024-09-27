@extends('layouts.admin')

@section('title', 'Review')

@section('content')
@auth
<div class="flex">
    <!-- Main Content Area -->
    <div class="flex-1 p-6 overflow-y-auto max-h-screen">
        <header class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Review</h1>
            <p class="text-lg">Hello, {{ Auth::user()->full_name }}</p>
        </header>


        <!-- Review Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead class="bg-blue-800 text-white">
                    <tr>
                       
    
                        <th class="py-2 px-4 text-left">Rating</th>
                        <th class="py-2 px-4 text-left">Comment</th>
                        <th class="py-2 px-4 text-left">Date review</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                    <tr class="border-b">
                        
                        <td class="py-2 px-4 overflow-hidden line-clamp-1">{{ $review -> rating}}</td>
                        <td class="py-2 px-4 overflow-hidden line-clamp-1">{{ $review -> comment}}</td>
                        <td class="py-2 px-4 overflow-hidden line-clamp-1">{{ $review -> review_date}}</td>
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