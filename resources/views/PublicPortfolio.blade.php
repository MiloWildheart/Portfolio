<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <x-scroll-bar></x-scroll-bar>
    <x-whitespace>
        <x-searchbar :tags="$tags"></x-searchbar>
    </x-whitespace>
    
    <x-divider>Test</x-divider>
    <x-portfolio-gallery :portfolioItems="$portfolioItems"></x-portfolio-gallery>
    <x-footer></x-footer>
</body>

</html>
