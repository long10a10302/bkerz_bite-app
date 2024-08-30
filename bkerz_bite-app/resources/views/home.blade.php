<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tail-Blog</title>
    <link rel="stylesheet" href="{{ asset('src/css/fontawesome-all.min.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="font-poppins text-gray-600 bg-gray-100">
    <!-- Navbar -->
    <nav class="shadow-sm bg-white">
        <div class="container px-4 mx-auto flex items-center py-3">
            <!-- Logo -->
            <div class="lg:w-44 w-40">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-full">
                </a>
            </div>
            <!-- Navlinks -->
            <div class="ml-12 lg:flex space-x-5 hidden">
                <a href="/" class="flex items-center font-semibold text-sm transition hover:text-blue-500">
                    <span class="mr-2"><i class="fas fa-home"></i></span> Home
                </a>
                <a href="{{ route('user.register') }}" class="flex items-center font-semibold text-sm transition hover:text-blue-500">
                    <span class="mr-2"><i class="fas fa-user-plus"></i></span> Register
                </a>
                <a href="{{ route('user.login') }}" class="flex items-center font-semibold text-sm transition hover:text-blue-500">
                    <span class="mr-2"><i class="fas fa-sign-in-alt"></i></span> Login
                </a>
            </div>
            <!-- Searchbar -->
            <div class="relative lg:ml-auto hidden lg:block">
                <span class="absolute left-3 top-2 text-sm text-gray-500"><i class="fas fa-search"></i></span>
                <input type="text" class="block w-full shadow-sm border-none rounded-3xl pl-11 pr-2 py-2 focus:outline-none bg-gray-50 text-sm text-gray-700 placeholder-gray-500" placeholder="Search">
            </div>
            <div class="text-xl text-gray-700 cursor-pointer ml-4 xl:hidden block hover:text-blue-500 transition" id="open_sidebar">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <main class="pt-12 pb-12">
        <div class="container mx-auto px-4 flex flex-wrap lg:flex-nowrap">
            <!-- Left Sidebar -->
            <div class="w-full xl:w-3/12 hidden xl:block">
                <!-- Categories -->

                <!-- Recent Posts -->
                <div class="w-full bg-white shadow-sm rounded-sm p-4">
                    <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Recent Posts</h3>
                    @foreach ($postsRecent as $post)
                    <div class="space-y-4">
                        <a href="{{ route('post.show',['id'=>$post->id]) }}" class="flex group">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('images/' . $post->url) }}" alt="Post image" class="h-14 w-20 rounded object-cover">
                            </div>
                            <div class="flex-grow pl-3">
                                <h5 class="text-md leading-5 block font-roboto font-semibold transition group-hover:text-blue-500">
                                   {{ $post -> title }}
                                </h5>
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-1 text-xs"><i class="far fa-clock"></i></span> {{ $post->created_at }}
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Main Content -->
            <div class="xl:w-6/12 lg:w-9/12 w-full xl:ml-6 lg:mr-6">
                <!-- Title -->
                <div class="flex bg-white px-3 py-2 justify-between items-center rounded-sm mb-5">
                    <h5 class="text-base uppercase font-semibold font-roboto">Business</h5>
                    <a href="#" class="text-white py-1 px-3 rounded-sm uppercase text-sm bg-blue-500 border border-blue-500 hover:text-blue-500 hover:bg-transparent transition">
                        See more
                    </a>
                </div>

                <!-- Regular Post -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    @foreach ($posts as $post)
                        <div class="rounded-sm bg-white p-4 pb-5 shadow-sm">
                            <a href="{{ route('post.show',['id'=>$post->id]) }}" class="block rounded-md overflow-hidden">
                                <img src="{{ asset('images/' . $post->url) }}" alt="Post image" class="w-full h-60 object-cover transform hover:scale-110 transition duration-500">
                            </a>
                            <div class="mt-3">
                                <a href="{{ route('post.show',['id'=>$post->id]) }}">
                                    <h2 class="block text-xl font-semibold text-gray-700 hover:text-blue-500 transition font-roboto">
                                        {{ $post->title }}
                                    </h2>
                                </a>
                                <div class="mt-2 flex space-x-3">
                                    <div class="flex text-gray-400 text-sm items-center">
                                        <span class="mr-2 text-xs"><i class="far fa-user"></i></span> Blogging Tips
                                    </div>
                                    <div class="flex text-gray-400 text-sm items-center">
                                        <span class="mr-2 text-xs"><i class="far fa-clock"></i></span> {{ $post->created_at }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="lg:w-3/12 w-full mt-8 lg:mt-0">
                <!-- Social Plugin -->

                <!-- Popular Posts -->
                <div class="w-full bg-white shadow-sm rounded-sm p-4">
                    <h3 class="text-xl font-semibold text-gray-700 mb-3 font-roboto">Popular Posts</h3>
                    <div class="space-y-4">
                        <a href="#" class="flex group">
                            <div class="flex-shrink-0">
                            </div>
                            <div class="flex-grow pl-3">
                                <h5 class="text-md leading-5 block font-roboto font-semibold transition group-hover:text-blue-500">
                                    Team Bitbose geared up to attend Blockchain
                                </h5>
                                <div class="flex text-gray-400 text-sm items-center">
                                    <span class="mr-1 text-xs"><i class="far fa-clock"></i></span> June 11, 2021
                                </div>
                            </div>
                        </a>
                    </div>
               
                </div>

                <!-- Ad -->
           
            </div>
        </div>
    </main>

    <!-- Sidebar -->
    <div class="sidebar fixed w-full h-full z-50 left-0 top-0 bg-black bg-opacity-50 invisible opacity-0 transition-all" id="sidebar">
        <div class="lg:w-80 md:w-2/3 w-full h-full bg-white shadow-md p-6 overflow-y-auto">
            <div class="flex justify-between">
                <h3 class="text-gray-700 text-2xl font-semibold">Tail-Blog</h3>
                <span class="text-xl text-gray-700 cursor-pointer hover:text-blue-500 transition" id="close_sidebar"><i class="fas fa-times"></i></span>
            </div>
            <div class="mt-8">
                <a href="#" class="flex py-2 text-gray-700 hover:text-blue-500 transition font-semibold">
                    <span class="text-sm"><i class="fas fa-home"></i></span>
                    <span class="ml-2 text-sm">Home</span>
                </a>
                <a href="{{ route('user.register') }}" class="flex py-2 text-gray-700 hover:text-blue-500 transition font-semibold">
                    <span class="text-sm"><i class="fas fa-user-plus"></i></span>
                    <span class="ml-2 text-sm">Register</span>
                </a>
                <a href="{{ route('user.login') }}" class="flex py-2 text-gray-700 hover:text-blue-500 transition font-semibold">
                    <span class="text-sm"><i class="fas fa-sign-in-alt"></i></span>
                    <span class="ml-2 text-sm">Login</span>
                </a>
                <div class="relative mt-4">
                    <span class="absolute left-3 top-2 text-sm text-gray-500"><i class="fas fa-search"></i></span>
                    <input type="text" class="block w-full shadow-sm border-none rounded-3xl pl-11 pr-2 py-2 focus:outline-none bg-gray-50 text-sm text-gray-700 placeholder-gray-500" placeholder="Search">
                </div>
            </div>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const open_sidebar = document.getElementById('open_sidebar');
        const close_sidebar = document.getElementById('close_sidebar');

        open_sidebar.onclick = function() {
            sidebar.classList.remove('invisible', 'opacity-0');
        }

        close_sidebar.onclick = function() {
            sidebar.classList.add('invisible', 'opacity-0');
        }

        window.onclick = function(event) {
            if (event.target === sidebar) {
                sidebar.classList.add('invisible', 'opacity-0');
            }
        }
    </script>
</body>

</html>
