<div class="container mx-auto pt-8 pb-1">
    <x-divider>Search</x-divider>
    <!-- Search input -->
    <form id="searchForm" action="{{ route('portfolio.search') }}" method="GET" class="mb-6">
        <div class="flex items-center">
            <input id="searchInput"
                class="w-full h-16 rounded focus:outline-none focus:shadow-outline text-xl px-8 shadow-lg" type="search"
                name="name" placeholder="Search..." value="{{ request('name') }}">
        </div>
    </form>

    <!-- Tags and Clear button -->
    <div class="flex justify-between mb-2 items-center">
        <p class="text-xl mb-4">Tags</p>
        <button type="button" onclick="clearSearch()"
            class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
            Clear
        </button>
    </div>

    <!-- Tags -->
    <nav class="flex">
        @foreach($tags as $tag)
            <a class="no-underline rounded text-black py-3 px-4 font-medium mr-3 hover:bg-indigo-darker"
                style="background-color: {{ $tag->color }}" href="#" onclick="addTag('{{ $tag->name }}')">
                {{ $tag->name }}
            </a>
        @endforeach
    </nav>
</div>

<script>
    function addTag(tag) {
        var searchInput = document.getElementById('searchInput');
        var currentValue = searchInput.value;
        var newValue = currentValue ? currentValue + ', ' + tag : tag;
        searchInput.value = newValue;
        document.getElementById('searchForm').submit(); // Submit the form after adding the tag
    }

    function clearSearch() {
        var searchInput = document.getElementById('searchInput');
        searchInput.value = '';
        document.getElementById('searchForm').submit(); // Submit the form after clearing the search
    }
</script>
