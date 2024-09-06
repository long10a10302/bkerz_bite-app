<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <div class="w-64 bg-blue-800 text-white h-screen flex flex-col">
        <div class="p-4 text-2xl font-bold">
            Admin Dashboard
        </div>
        <nav class="mt-4 flex-1">
            <a href="{{ route('admin') }}" class="block py-2.5 px-4 hover:bg-blue-700">Dashboard</a>
            <a href="{{ route('admin.category') }}" class="block py-2.5 px-4 hover:bg-blue-700">Category</a>
            <a href="{{ route('admin.cake') }}" class="block py-2.5 px-4 hover:bg-blue-700">Cakes</a>
            <a href="{{ route('admin.review') }}" class="block py-2.5 px-4 hover:bg-blue-700">Review</a>

        </nav>
        <div class="p-4">
            <a href="{{ route('user.logout') }}" class="w-full bg-blue-700 py-2 px-4 rounded hover:bg-blue-600">Logout</a>
        </div>
    </div>
    <div class="flex-1 p-6">
        @yield('content')
      
    </div>
  
</body>
</html>
