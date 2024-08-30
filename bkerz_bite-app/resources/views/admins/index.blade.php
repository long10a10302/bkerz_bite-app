<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <div class="w-64 bg-blue-800 text-white h-screen flex flex-col">
        <div class="p-4 text-2xl font-bold">
            Admin Dashboard
        </div>
        <nav class="mt-4 flex-1">
            <a href="#" class="block py-2.5 px-4 hover:bg-blue-700">Dashboard</a>
            <a href="{{ route('admin.post') }}" class="block py-2.5 px-4 hover:bg-blue-700">Posts</a>
        </nav>
        <div class="p-4">
            <a href="{{ route('user.logout') }}"class="w-full bg-blue-700 py-2 px-4 rounded hover:bg-blue-600">Logout</a>
        </div>
    </div>
    <!-- Main Content -->
    @auth
    <div class="flex-1 p-6">
        <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
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
    </div>
    @else
    <div class="flex-1 p-6 text-center">
        <h1 class="text-3xl font-bold mb-6">Unauthorized Access</h1>
        <p>You are not authorized to access this page.</p>
    </div>
    @endauth
   
       

    <!-- Sidebar -->
   
</body>
</html>
