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
                <div class="max-w-2xl mx-auto mb-8 text-center">
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
                <div id="pageBuckets" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    <!-- Content for buckets will be added here -->
                </div>

                <!-- Allergen Information -->
                <div class="max-w-2xl mx-auto text-gray-700">
                    <p class="note text-base mb-6">
                        <strong>Information on Allergens</strong><br>
                        We at Bkerz Bite are committed to exceptional standards of quality and kitchen organization.
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
