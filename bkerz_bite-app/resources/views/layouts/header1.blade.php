<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakerz Bite</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</head>

<body>

    <script src="https://unpkg.com/alpinejs@3.9.1/dist/cdn.min.js" defer></script>
    @auth
    <nav class="bg-[#EBE1CB] border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="http://127.0.0.1:8000/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="/images/bakerzBite.svg" class="h-10" alt="BakerBite Logo" />
                <span class="self-center text-2xl font-serif font-semibold text-[#7D5751]">BAKERZ BITE</span>
            </a>
            <div class="hidden w-full md:flex md:w-auto justify-between items-center" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0">
                    <li>
                        <a href="/" class="text-[#7D5751] font-serif hover:underline">Home</a>
                    </li>

                    <li x-data="{ open: false }" class="relative">
                        <a href="#" @click.prevent="open = !open"
                            class="text-[#7D5751] font-serif hover:underline inline-block">Menus</a>
                        <ul x-show="open" @click.outside="open = false"
                            class="absolute bg-[#EBE1CB] mt-1 z-50 shadow-lg block w-64"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform translate-y-1"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform translate-y-1">
                            <li><a href="{{ route('overview') }}"
                                    class="block px-4 py-2 hover:bg-[#7D5751] hover:text-white">Overview</a></li>
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('categorydetail', $category->category_id) }}"
                                    class="block px-4 py-2 hover:bg-[#7D5751] hover:text-white">
                                    {{ $category->category_name }}
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </li>

                    <li x-data="{ open: false }" class="relative">
                        <a href="#" @click.prevent="open = !open"
                            class="text-[#7D5751] font-serif hover:underline inline-block">Hello {{ Auth::user()->full_name }}</a>
                        <ul x-show="open" @click.outside="open = false"
                            class="absolute bg-[#EBE1CB] mt-1 z-50 shadow-lg block w-64"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform translate-y-1"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform translate-y-1">
                            <li><a href="{{route('user.logout')}}"
                                    class="block px-4 py-2 hover:bg-[#7D5751] hover:text-white">Logout</a></li>

                        </ul>
                    </li>
                    <li>
                    <a href="{{route('user.review')}}" class="text-[#7D5751] font-serif hover:underline">Review</a>
                    </li>

                    <li>
                        <a href="{{route('status')}}" class="text-[#7D5751] font-serif hover:underline">Status</a>
                    </li>
                    <li class="flex items-center">
                        <!-- Cart Icon using SVG -->
                        <a href="{{ route('cart') }}" class="mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#7D5751] hover:text-[#5c423d]"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM7.16 14h9.48l1.41-6H6.45l-.94-2H2v2h2l3.6 8H17v-2H7.87l-.71-2z" />
                            </svg>
                        </a>
                    </li>
                   

                </ul>
            </div>
        </div>
    </nav>
    @else
    <nav class="bg-[#EBE1CB] border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="http://127.0.0.1:8000/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="/images/bakerzBite.svg" class="h-10" alt="BakerBite Logo" />
                <span class="self-center text-2xl font-serif font-semibold text-[#7D5751]">BAKERZ BITE</span>
            </a>
            <div class="hidden w-full md:flex md:w-auto justify-between items-center" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0">
                    <li>
                        <a href="/" class="text-[#7D5751] font-serif hover:underline">Home</a>
                    </li>
                    <li x-data="{ open: false }" class="relative">
                        <a href="#" @click.prevent="open = !open"
                            class="text-[#7D5751] font-serif hover:underline inline-block">Menus</a>
                        <ul x-show="open" @click.outside="open = false"
                            class="absolute bg-[#EBE1CB] mt-1 z-50 shadow-lg block w-64"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform translate-y-1"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform translate-y-1">
                            <li><a href="{{ route('overview') }}"
                                    class="block px-4 py-2 hover:bg-[#7D5751] hover:text-white">Overview</a></li>
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('categorydetail', $category->category_id) }}"
                                    class="block px-4 py-2 hover:bg-[#7D5751] hover:text-white">
                                    {{ $category->category_name }}
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </li>
                  
                    <li>

                        <!-- Order Online Button -->
                        <a href="/users/login"
                            class="text-white bg-[#7D5751] font-serif px-4 py-2 rounded hover:bg-[#5c423d]">Order
                            Online</a>
                    </li>

                  
                </ul>
            </div>
        </div>
    </nav>
    @endauth
</body>

</html>