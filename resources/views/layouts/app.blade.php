<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Robin Knol</title>
        @vite('resources/css/app.css')
        <!-- {{-- blade-formatter-disable --}} -->
        <style>

        </style>
        <!-- {{-- blade-formatter-enable --}} -->
    </head>
    
    <body>
        <div class='container'>
            @yield('content')
        </div>
    </body>
</html>