@extends('layouts.app')


@section('content')
<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-1/2 bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4 text-center">REVIEW SHOP</h1>


        <!-- Form Đánh Giá -->
        <form action="{{ route('user.reviewed') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="rating" class="block text-sm font-medium text-gray-700">Xếp Hạng:</label>
                <select name="rating" id="rating" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                    <option value="" disabled selected>Chọn xếp hạng</option>
                    <option value="1">1 Sao</option>
                    <option value="2">2 Sao</option>
                    <option value="3">3 Sao</option>
                    <option value="4">4 Sao</option>
                    <option value="5">5 Sao</option>
                </select>
            </div>


            <div class="mb-4">
                <label for="comment" class="block text-sm font-medium text-gray-700">Bình luận:</label>
                <textarea name="comment" id="comment" rows="4" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md"></textarea>
            </div>


            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-500">
                Gửi Đánh Giá
            </button>
        </form>


        @if(session('success'))
            <div id="thankYouPopup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white p-4 rounded-lg">
                    <p class="text-lg">{{ session('success') }}</p>
                    <button onclick="closePopup()" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md">
                        Đóng
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>


    </div>
</div>


@endsection


<script>
function closePopup() {
    document.getElementById('thankYouPopup').style.display = 'none';
}
</script>


