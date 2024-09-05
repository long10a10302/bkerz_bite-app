<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <!-- Add your CSS links here -->
</head>
<body>
    @include('layouts.header')
    @include('layouts.footer2')

    <div class="content">
        @yield('content')
    </div>

    <!-- Add your footer here if needed -->
</body>
</html>
