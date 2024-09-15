<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    {{-- Check if the current route is 'user.login' --}}
    @if (Route::is('user.login') || Route::is('user.register'))
        @include('layouts.header2')  {{-- Include header2 for the login page --}}
    @else
        @include('layouts.header1')  {{-- Include header1 for all other pages --}}
    @endif
    
    <main>
        @yield('content')
    </main>

    @include('layouts.footer2')
</body>

</html>
