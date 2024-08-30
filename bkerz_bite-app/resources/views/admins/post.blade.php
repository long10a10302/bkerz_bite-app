<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <div class="w-64 bg-blue-800 text-white h-screen flex flex-col">
        <div class="p-4 text-2xl font-bold">
            Admin Dashboard
        </div>
        <nav class="mt-4 flex-1">
            <a href="{{ route('admin') }}" class="block py-2.5 px-4 hover:bg-blue-700">Dashboard</a>
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
        <a href="{{ route('post.create') }}" class="text-blue-500 hover:text-blue-700 hover:underline mb-4 inline-block">Create</a>
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Author</th>
                    <th class="py-2 px-4 border-b">Created At</th>
                    <th class="py-2 px-4 border-b">Updated At</th>
                    <th class="py-2 px-4 border-b">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="bg-gray-50 hover:bg-gray-100">
                        <td class="border-b px-4 py-2">{{ $post->title }}</td>
                        <td class="border-b px-4 py-2">{{ $post->user->name }}</td>
                        <td class="border-b px-4 py-2">{{ $post->created_at->format('d M Y') }}</td>
                        <td class="border-b px-4 py-2">{{ $post->updated_at->format('d M Y') }}</td>
                        <td class="border-b px-4 py-2">
                            <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="text-blue-500 hover:text-blue-700 hover:underline mr-2">Edit</a>
                            <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="text-red-500 hover:text-red-700 hover:underline">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="flex-1 p-6 text-center">
        <h1 class="text-3xl font-bold mb-6">Unauthorized Access</h1>
        <p>You are not authorized to access this page.</p>
    </div>
    @endauth
</body>
</html>
