<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body>
    {{-- Check if the current route is 'user.login' --}}
    @if (Route::is('user.login') || Route::is('user.register'))
    @include('layouts.header2') {{-- Include header2 for the login page --}}
    @else
    @include('layouts.header1') {{-- Include header1 for all other pages --}}
    @endif

    <main>
        @yield('content')
    </main>

    @include('layouts.footer2')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const decreaseButtons = document.querySelectorAll('.decrease');
            const increaseButtons = document.querySelectorAll('.increase');

            // Xử lý nút giảm
            decreaseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const quantityInput = document.getElementById('quantity-' + id);
                    let quantity = parseInt(quantityInput.value);

                    // Không giảm số lượng dưới 1
                    if (quantity > 1) {
                        quantity--;
                        updateQuantity(id, quantity, quantityInput);
                    }
                });
            });

            // Xử lý nút tăng
            increaseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const quantityInput = document.getElementById('quantity-' + id);
                    let quantity = parseInt(quantityInput.value);
                    quantity++;
                    updateQuantity(id, quantity, quantityInput);
                });
            });

            // Hàm AJAX cập nhật số lượng
            function updateQuantity(id, quantity, inputElement) {
                fetch(`/cart/update-quantity/${id}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            quantity: quantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            inputElement.value = data.quantity;
                        } else {
                            alert(data.message || 'Unable to update quantity.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    </script>

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