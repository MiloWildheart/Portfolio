<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Robin Knol</title>
        @vite('resources/css/app.css')
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        
        
        
        {{-- blade-formatter-disable --}}
        <style type='text/tailwindcss'>
            .tag-item {
                @apply text-sm rounded-md bg-white p-4 leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10;
            }
            .tag-name{
                @apply text-lg font-semibold text-slate-800 hover:text-slate-600;
            }
            .tag-color{
                @apply inline-block w-4 h-4 rounded-full;
            }
            .empty-item{
                @apply text-sm rounded-md bg-white py-10 px-4 text-center leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10;
            }
            .empty-text {
               @apply  font-medium mt-99 text-center text-slate-500;
            }
          

        </style>
        {{-- blade-formatter-enable --}}
    </head>
    
    <body>
        <div class='container mx-auto mt-10 mb-10 max-w-3xl'>
            @yield('content')
        </div>
    </body>
</html>