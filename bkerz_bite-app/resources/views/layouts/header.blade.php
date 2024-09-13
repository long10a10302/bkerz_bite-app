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

    <nav class="bg-[#EBE1CB] border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="http://127.0.0.1:8000/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="/images/bakerzBite.svg" class="h-10" alt="BakerBite Logo" />
                <span class="self-center text-2xl font-serif font-semibold text-[#7D5751]">BAKERZ BITE</span>
            </a>
            <div class="hidden w-full md:flex md:w-auto justify-between items-center" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0">
                    <li>
                        <a href="#" class="text-[#7D5751] font-serif hover:underline">Home</a>
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
                            <li><a href="#"
                                    class="block px-4 py-2 hover:bg-[#7D5751] hover:text-white">Overview</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-[#7D5751] hover:text-white">Breakfast
                                    Pastries</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-[#7D5751] hover:text-white">Macarons,
                                    Chocolates & Cookies</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-[#7D5751] hover:text-white">Delicious
                                    Breads</a></li>
                            <li><a href="#"
                                    class="block px-4 py-2 hover:bg-[#7D5751] hover:text-white">Desserts</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-[#7D5751] hover:text-white">Seasonal
                                    Delights</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-[#7D5751] hover:text-white">Savory
                                    Delights</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="text-[#7D5751] font-serif hover:underline">Happy Customers</a>
                    </li>
                    <li>
                        <a href="/users/login"
                            class="text-white bg-[#7D5751] font-serif px-4 py-2 rounded hover:bg-[#5c423d]">Order
                            Online</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
