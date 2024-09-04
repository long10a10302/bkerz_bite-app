@extends('layouts.admin')

@section('title', 'Cakes')


@section('content')
<!-- Nội dung trang Cakes -->
@auth
<div class="flex-1 p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">List Cake</h1>
        <div class="flex items-center space-x-4">
            <p class="text-lg">Hello, {{ Auth::user()->full_name }}</p>
        </div>
    </div>

    <!-- Cake Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow">
            <thead class="bg-blue-800 text-white">
                <tr>
                    <th class="py-2 px-4 text-left">Tên bánh</th>
                    <th class="py-2 px-4 text-left">Miêu tả bánh</th>
                    <th class="py-2 px-4 text-left">Giá</th>
                    <th class="py-2 px-4 text-left">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Data - Replace with dynamic data -->
                @foreach ($cakes as $cake)
                <tr class="border-b">
                    <td class="py-2 px-4">{{$cake->name}}</td>
                    <td class="py-2 px-4">{{$cake->description}}</td>
                    <td class="py-2 px-4">{{$cake->price}}</td>
                    <td class="py-2 px-4">
                        <a href="#" class="text-blue-500 hover:text-blue-700 mr-2">Sửa</a>
                        <a href="#" class="text-red-500 hover:text-red-700">Xóa</a>
                    </td>
                </tr>
                @endforeach
                <!-- Add more rows here -->
            </tbody>
        </table>
    </div>
</div>
@else
<div class="flex-1 p-6 text-center">
    <h1 class="text-3xl font-bold mb-6">Unauthorized Access</h1>
    <p>You are not authorized to access this page.</p>
</div>
@endauth
@endsection


</body>

</html>