<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Robin Knol</title>
        @vite('resources/css/app.css')
        <!-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> -->
        <!-- <link rel="stylesheet" href="https://rsms.me/inter/inter.css"> -->
        <!-- <script src="https://cdn.tailwindcss.com"></script> -->
        
        
        
     
    </head>
    
    <body>
        
        <div class='container mx-auto mt-10 mb-10 max-w-3xl'>
            <x-sidebar></x-sidebar>
            @yield('content')
        </div>
    </body>
</html>