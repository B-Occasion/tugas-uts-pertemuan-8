<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <body>
        <div class="container">
        <div class="topnav">
            <a href="{{ route('home') }}">Home</a> 
            <a href="{{ route('news') }}">News</a> 
            <a href="{{ route('contact') }}">Contact</a> 
            <a href="{{ route('about') }}">About</a> 
        </div>
            
            <div class="konten">
                @yield('content')
            </div>

            <div id="footer">
                <h1>INI FOOTER</h1>
            </div>
        </div>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
