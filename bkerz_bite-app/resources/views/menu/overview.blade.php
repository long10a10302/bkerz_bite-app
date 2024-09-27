@extends('layouts.app')

@section('content')
    <section id="main" class="bg-gray-100 py-8">
        <main>
            <!-- Banner Section -->
            <section id="pageBanner" class="relative">
                <div id="pageBannerWrapperBorder" class="border-b-4 border-gray-300"></div>
                <img class="w-full h-64 object-cover"
                    src="https://bakerynouveau.com/wp-content/uploads/2015/10/cookies_detail_n.jpg"
                    alt="Close up assortment of colorful macaron cookies" />
                <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
                    <h1 class="text-4xl font-bold">Our Creations</h1>
                    <h2 class="text-2xl">Menu</h2>
                </div>
            </section>

            <!-- Content Section -->
            <section id="content" class="py-8 px-4">
                <!-- Introduction Text -->
                <div class="text-left py-3 px-4 mt-6 mx-auto w-full max-w-6xl">
                    <h3 class="text-3xl font-semibold mb-4">Enjoy</h3>
                    <p class="text-lg text-gray-700">
                        The following pages contain samples of the wide range of products available at Bakery Nouveau.
                        Our products range from delicious sandwiches, to tender pastry, to rich, decadent desserts.
                        Our menu varies seasonally, and sometimes even weekly, depending on what’s fresh and inspiring to
                        our chefs.
                    </p>
                    <p class="mt-4 text-gray-700">
                        For our current selection and prices, please call us at
                        <span class="font-semibold">206-923-0534 (West Seattle), 206-858-6957 (Capitol Hill), or
                            206-717-2100 (Burien)</span>,
                        and we’ll be happy to answer your questions!
                    </p>
                </div>

                <!-- Page Buckets -->
                <div id="pageBuckets" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-4 mt-8 max-w-6xl mx-auto">
                    @foreach ($categories as $category)
                        <div class="pageBucket shadow-lg overflow-hidden transform transition duration-500 hover:scale-105">
                            <div class="pageBucketImage">
                                <a href="{{ route('categorydetail', $category->category_id) }}">
                                    <img src="{{ asset('images/' . $category->img_url) }}" class="w-full h-48 object-cover">
                                </a>
                            </div>
                            <div class="pageBucketText p-4 flex flex-col items-center justify-between text-center max-w-3xl mx-auto h-[300px]">
                                <h4 class="text-lg font-bold mb-2">{{ $category->category_name }}</h4>
                                <p class="text-gray-600 mb-4">{{ $category->description }}</p>
                                <a href="{{ route('categorydetail', $category->category_id) }}" class="inline-block w-full max-w-xs py-2 px-4 bg-[#5a3a27] text-white font-bold tracking-wider border border-[#5a3a27] shadow-[inset_0_0_0_1px_white,inset_0_0_0_3px_#5a3a27] rounded-md hover:bg-[#4e3322] transition duration-300 text-center">
                                    VIEW MENU
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $categories->links() }} <!-- Thêm dòng này để hiển thị phân trang -->
                </div>

                <!-- Allergen Information -->
                <div class="text-left py-4 px-4 mt-6 mx-auto w-full max-w-6xl">
                    <p class="note text-base mb-6">
                        <strong>Information on Allergens</strong><br>
                        We at Bakery Nouveau are committed to exceptional standards of quality and kitchen organization.
                        However, as we are a small shop, all of our equipment is shared.
                        Please do not hesitate to ask if you have a question or concern about a particular product.
                    </p>
                    <div class="divider border-b-2 border-gray-300 my-4"></div>
                    <p class="text-base">
                        Our café always has a large selection of fresh baked goods and desserts...
                    </p>
                </div>
            </section>
        </main>
    </section>

    <!-- Back to Top Section -->
    <div id="contactInfo" class="py-4 bg-gray-100">
        <div id="backToTop" class="text-center">
            <a href="#top" class="inline-block">
                <img class="mx-auto" src="https://bakerynouveau.com/wp-content/themes/bones/library/images/top.png"
                    alt="top" />
            </a>
        </div>
    </div>
@endsection
