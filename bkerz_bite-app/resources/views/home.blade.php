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
                        <img src="/images/{{ $image }}" alt="{{ $alt }}" class="w-full h-auto block">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Our Story Section -->
    <div id="ourStory" class="relative w-full h-[700px] flex items-center justify-center overflow-hidden">
        <img src="https://bakerynouveau.com/wp-content/uploads/2015/11/os.jpg" alt="Shaping bread and laminating dough"
            class="absolute top-0 left-0 w-full h-full object-cover" />
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white bg-opacity-80 p-8 rounded-lg shadow-md text-center max-w-[80%]">
            <h2 class="text-4xl font-bold mb-4">Our</h2>
            <h3 class="text-2xl font-semibold mb-4">Story</h3>
            <p class="mb-6">Bkerz Bite is a feast for the senses...</p>
            <a href="{{ url('/overview') }}"
                class="inline-block bg-blue-500 text-white px-4 py-2 rounded font-bold hover:bg-blue-700">
                Learn More
            </a>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="py-16 bg-white">
        <h2 class="text-3xl font-bold text-center mb-8">Our Creations</h2>
        <div class="grid grid-cols-3 gap-4 mt-16">
            <!-- Gallery Items -->
            @foreach ([['href' => '/breakfast-pastries', 'src' => 'gallery1.jpg', 'title' => 'Breakfast Pastries'], ['href' => '/delicious-breads', 'src' => 'gallery2.jpg', 'title' => 'Delicious Breads'], ['href' => '/desserts', 'src' => 'gallery3.jpg', 'title' => 'Delicious Desserts'], ['href' => '/macarons-chocolates-cookies', 'src' => 'gallery4.jpg', 'title' => 'Macarons & Chocolates'], ['href' => '/seasonal-delights', 'src' => 'gallery5.jpg', 'title' => 'Seasonal Delights'], ['href' => '/savory-delights', 'src' => 'gallery6.jpg', 'title' => 'Savory Delights']] as $item)
                <div class="relative overflow-hidden rounded-lg shadow-lg">
                    <a href="{{ url($item['href']) }}">
                        <img src="/images/{{ $item['src'] }}" alt="{{ $item['title'] }}"
                            class="w-full h-auto object-cover transition-transform duration-300 hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                            <h3 class="text-white text-lg font-semibold">{{ $item['title'] }}</h3>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Back to Top Section -->
    <div class="w-full text-center">
        <a href="#top" class="inline-block mt-4">
            <img src="https://bakerynouveau.com/wp-content/themes/bones/library/images/top.png" alt="Back to Top"
                class="w-10">
        </a>
    </div>
@endsection
