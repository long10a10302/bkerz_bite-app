<!-- resources/views/checkout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Bakerz Bite</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-screen-xl w-1/2 mx-auto p-6">
            <a href="/" class="text-2xl font-serif font-semibold text-gray-700">BAKERZ BITE</a>
        </div>
    </header>

    <!-- Main content -->
    <main class="max-w-screen-xl mx-auto py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Right Side: Order Summary -->
            <section class="bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-serif text-gray-800 mb-6">Order Summary</h2>

                <ul class="mb-6 space-y-4">
                    <li class="flex justify-between items-center">
                        {{-- Đổ dữ liệu --}}
                        <span>French Baguette</span>
                        <span>$3.00</span>
                    </li>
                    <li class="flex justify-between items-center">
                        {{-- Đổ dữ liệu --}}
                        <span>Chocolate Croissant</span>
                        <span>$4.50</span>
                    </li>
                    <li class="flex justify-between items-center">
                        {{-- Đổ dữ liệu --}}
                        <span>Macarons</span>
                        <span>$12.00</span>
                    </li>
                </ul>

                <div class="border-t border-gray-200 pt-4">
                    <div class="flex justify-between items-center">
                        <span class="font-medium">Subtotal</span>
                        <span>$19.50</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="font-medium">Tax</span>
                        <span>$1.50</span>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <span class="font-semibold text-lg">Total</span>
                        <span class="text-lg font-semibold">$21.00</span>
                    </div>
                </div>

            </section>
            <!-- Left Side: Checkout Form -->
            <section class="bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-serif text-gray-800 mb-6">Checkout</h2>

                <form action="#" method="POST">
                    <!-- Contact Information -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm text-gray-700 font-medium">Email address</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7D5751]"
                            required>
                    </div>

                    <!-- Shipping Address -->
                    <div class="mb-6">
                        <label for="address" class="block text-sm text-gray-700 font-medium">Shipping Address</label>
                        <input type="text" id="address" name="address"
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7D5751]"
                            required>
                    </div>

                    <!-- City, State, and ZIP -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div>
                            <label for="city" class="block text-sm text-gray-700 font-medium">City</label>
                            <input type="text" id="city" name="city"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7D5751]"
                                required>
                        </div>
                        <div>
                            <label for="state" class="block text-sm text-gray-700 font-medium">State</label>
                            <input type="text" id="state" name="state"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7D5751]"
                                required>
                        </div>
                        <div>
                            <label for="zip" class="block text-sm text-gray-700 font-medium">ZIP</label>
                            <input type="text" id="zip" name="zip"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7D5751]"
                                required>
                        </div>
                    </div>

                    <!-- Payment Information -->
                    <h3 class="text-xl font-serif text-gray-800 mb-4">Payment Information</h3>

                    <div class="mb-6">
                        <label for="card-name" class="block text-sm text-gray-700 font-medium">Cardholder Name</label>
                        <input type="text" id="card-name" name="card-name"
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7D5751]"
                            required>
                    </div>

                    <div class="mb-6">
                        <label for="card-number" class="block text-sm text-gray-700 font-medium">Card Number</label>
                        <input type="text" id="card-number" name="card-number"
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7D5751]"
                            required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label for="expiry" class="block text-sm text-gray-700 font-medium">Expiry Date</label>
                            <input type="text" id="expiry" name="expiry"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7D5751]"
                                placeholder="MM/YY" required>
                        </div>
                        <div>
                            <label for="cvv" class="block text-sm text-gray-700 font-medium">CVV</label>
                            <input type="text" id="cvv" name="cvv"
                                class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7D5751]"
                                required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-[#7D5751] text-white p-3 rounded-lg text-lg font-semibold hover:bg-[#5c423d]">
                        Place Order
                    </button>
                </form>
            </section>



        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-inner">
        <div class="max-w-screen-xl mx-auto p-6">
            <p class="text-center text-gray-600">© 2024 Bakerz Bite. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
