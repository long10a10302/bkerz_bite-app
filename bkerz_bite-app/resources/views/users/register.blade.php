<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input type="text" id="full_name" name="full_name" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @if ($errors->has('full_name'))
                    <span class="text-red-500 text-sm">{{ $errors->first('full_name') }}</span>
                @endif
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @if ($errors->has('email'))
                    <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-4">
                <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Optional">
                @if ($errors->has('phone_number'))
                    <span class="text-red-500 text-sm">{{ $errors->first('phone_number') }}</span>
                @endif
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @if ($errors->has('password'))
                    <span class="text-red-500 text-sm">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="mb-6">
                <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                <input type="password" id="confirm-password" name="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @if ($errors->has('password_confirmation'))
                    <span class="text-red-500 text-sm">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
            <div class="flex items-center justify-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>
</html>