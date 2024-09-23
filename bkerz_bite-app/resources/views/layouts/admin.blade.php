<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="bg-gray-100 flex">
    <div class="w-64 bg-blue-800 text-white h-screen flex flex-col">
        <div class="p-4 text-2xl font-bold">
            Admin Dashboard
        </div>
        <nav class="mt-4 flex-1">
            <ul>
                <li><a href="{{ route('admin') }}" class="block py-2.5 px-4 hover:bg-blue-700">Dashboard</a></li>
                <li><a href="{{ route('admin.category') }}" class="block py-2.5 px-4 hover:bg-blue-700">Category</a></li>
                <li><a href="{{ route('admin.cake') }}" class="block py-2.5 px-4 hover:bg-blue-700">Cakes</a></li>
                <li><a href="{{ route('admin.order') }}" class="block py-2.5 px-4 hover:bg-blue-700">Order</a></li>
                <li><a href="{{ route('admin.review') }}" class="block py-2.5 px-4 hover:bg-blue-700">Review</a></li>
            </ul>
        </nav>
        <div class="p-4">
            <a href="{{ route('user.logout') }}" class="w-full bg-blue-700 py-2 px-4 rounded hover:bg-blue-600">Logout</a>
        </div>
    </div>
    <div class="flex-1 p-6">
        @yield('content')
    </div>

    <script>
        function updateOrderStatus(orderId, status) {
            fetch(`/order/update-status/${orderId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        status: status
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Status updated successfully!');
                    } else {
                        alert(data.message || 'Unable to update status.');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>

</body>

</html>