<div class="container mx-auto py-8">
    <input class="w-full h-16 px-3 rounded mb-6 focus:outline-none focus:shadow-outline text-xl px-8 shadow-lg"
        type="search" placeholder="Search...">
    <div class="flex">
        <p class="text-xl mb-2">Tags</p>
    </div>
    <nav class="flex">
        @foreach($tags as $tag)
            <a class="no-underline rounded text-blak py-3 px-4 font-medium mr-3 hover:bg-indigo-darker"
                style="background-color: {{ $tag->color }}" href="#">{{ $tag->name }}</a>
        @endforeach
    </nav>
</div>
