@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

<!-- Carousel Section -->
<div class="relative w-full h-[700px] overflow-hidden">
    <div id="carousel" class="relative w-full h-full" data-carousel="slide">
        <!-- Carousel Wrapper -->
        <div class="flex transition-transform duration-700 ease-in-out">
            <!-- Carousel Items -->
            @foreach ([
                'Bread-slide-1853.jpg' => 'Bread slide',
                'caramello-slice-e1632865980223.jpg' => 'Caramello slice',
                'croissants.jpg' => 'Croissants',
                'gallery_template_cookies_3.jpg' => 'Cookies',
                'pastry-0491.jpg' => 'Pastry',
            ] as $image => $alt)
                <div class="hidden duration-700 ease-in-out" data-carousel-item="{{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('images/' . $image) }}" alt="{{ $alt }}" class="w-full h-auto block">
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Gallery Section -->
<div class="py-16 bg-white">
    <h2 class="text-3xl font-bold text-center mb-8">Our Creations</h2>
    <div class="grid grid-cols-3 gap-4 mt-16">
        <!-- Gallery Items -->
        @foreach ($categories as $category)
            <div class="relative overflow-hidden rounded-lg shadow-lg">
                <a href="{{ route('categorydetail', $category->category_id) }}" class="block">
                    <div class="aspect-w-1 aspect-h-1 w-full h-64">
                        <img src="{{ asset('images/' . $category->img_url) }}" alt="{{ $category->category_name }}" 
                             class="object-cover w-full h-full transition-transform duration-300 hover:scale-110">
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                        <h3 class="text-white text-lg font-semibold">{{ $category->category_name }}</h3>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $categories->links() }} <!-- Hiển thị liên kết phân trang -->
    </div>
</div>

<!-- Back to Top Section -->
<div class="w-full text-center mt-4">
    <a href="#top" class="inline-block">
        <img src="https://bakerynouveau.com/wp-content/themes/bones/library/images/top.png" alt="Back to Top" class="w-10">
    </a>
</div>

@endsection
