<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css'])
        @include('header')
        @livewireStyles
    </head>

    <body>
        <div class="container mx-auto">
            @yield('content')
            @livewireScripts
        </div>

        @include('footer')
    </body>

</html>