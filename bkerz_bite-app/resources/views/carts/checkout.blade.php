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

                @php
                $totalPrice = 0; // Initialize total price
                $orderDetails = []; // Array to store order details
                @endphp

                <table class="min-w-full border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="text-left p-3 border-b border-gray-300">Product</th>
                            <th class="text-center p-3 border-b border-gray-300">Quantity</th>
                            <th class="text-right p-3 border-b border-gray-300">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart->cartItems as $item)
                        <tr>
                            <td class="p-3 border-b border-gray-300">{{ $item->product->name }}</td>
                            <td class="text-center p-3 border-b border-gray-300">{{ $item->quantity }}</td>
                            <td class="text-right p-3 border-b border-gray-300">${{ number_format($item->product->price, 2) }}</td>
                        </tr>

                        @php
                        // Accumulate total price
                        $totalPrice += $item->quantity * $item->product->price;

                        // Add order details to the array
                        $orderDetails[] = [
                        'product_id' => $item->product->product_id,
                        'quantity' => $item->quantity,
                        'price' => $item->product->price,
                        ];
                        @endphp
                        @endforeach
                    </tbody>
                </table>

                <!-- Display total price -->
                <div class="border-t border-gray-200 pt-4 mt-6">
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-lg">Total</span>
                        <span class="font-bold text-lg">${{ number_format($totalPrice, 2) }}</span>
                    </div>
                </div>
            </section>

            <!-- Left Side: Checkout Form -->
            <section class="bg-white p-8 shadow-lg rounded-lg">
                <h2 class="text-2xl font-serif text-gray-800 mb-6">Checkout</h2>

                <form id="checkoutForm" action="{{ route('order') }}" method="POST" onsubmit="return handleFormSubmit(event)">
                    @csrf
                    <!-- Contact Information -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm text-gray-700 font-medium">Email address</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7D5751]"
                            value="{{ Auth::check() ? Auth::user()->email : '' }}" required>
                    </div>

                    <!-- Shipping Address -->
                    <div class="mb-6">
                        <label for="address" class="block text-sm text-gray-700 font-medium">Shipping Address</label>
                        <input type="text" id="address" name="address"
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7D5751]"
                            required>
                    </div>

                    <!-- Order Details (hidden fields) -->
                    @foreach ($orderDetails as $index => $detail)
                    <input type="hidden" name="orderDetails[{{ $index }}][product_id]" value="{{ $detail['product_id'] }}">
                    <input type="hidden" name="orderDetails[{{ $index }}][quantity]" value="{{ $detail['quantity'] }}">
                    <input type="hidden" name="orderDetails[{{ $index }}][price]" value="{{ $detail['price'] }}">
                    @endforeach

                    <!-- Payment Method -->
                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="payment-method" value="card" class="form-radio h-5 w-5 text-blue-600" id="payByCard">
                            <span class="ml-2 text-gray-700">Pay by card</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                            <input type="radio" name="payment-method" value="cash" class="form-radio h-5 w-5 text-green-600" id="payOnDelivery" checked>
                            <span class="ml-2 text-gray-700">Pay on delivery</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-[#7D5751] text-white p-3 rounded-lg text-lg font-semibold hover:bg-[#5c423d]">
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
    <script>
        function handleFormSubmit(event) {
            const payByCard = document.getElementById('payByCard');

            if (payByCard.checked) {
                event.preventDefault(); // Ngăn chặn gửi biểu mẫu
                alert('Tính năng đang phát triển, vui lòng thử lại sau!');
                return false; // Trả về false để không gửi biểu mẫu
            }

            return true; // Chấp nhận gửi biểu mẫu nếu không chọn "Pay by card"
        }
    </script>
</body>

</html>