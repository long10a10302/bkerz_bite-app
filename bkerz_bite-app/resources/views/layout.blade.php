<!-- resources/views/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

    <!-- Include the header -->
    @include('layouts.header')

    <!-- Main content section -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Include the footer -->
    @include('layouts.footer2')

</body>

</html>
