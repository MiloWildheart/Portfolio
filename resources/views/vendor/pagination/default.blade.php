<style scoped>
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    /* Pagination item */
    .pagination li {
        list-style-type: none;
        margin: 0 5px;
    }

    /* Pagination link */
    .pagination li a {
        display: inline-block;
        padding: 8px 16px;
        text-decoration: none;
        color: #333;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    /* Hover state */
    .pagination li a:hover {
        background-color: #f0f0f0;
    }

    /* Active state */
    .pagination li.active a {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    /* Disabled state */
    .pagination li.disabled a {
        pointer-events: none; /* Disable pointer events */
        background-color: #f0f0f0; /* Set background color */
        color: #ccc; /* Set text color */
        border-color: #ccc; /* Set border color */
    }

    /* Style for disabled << button */
    .pagination li.disabled span {
        pointer-events: none; /* Disable pointer events */
        background-color: #f0f0f0; /* Set background color */
        color: #ccc; /* Set text color */
        border-color: #ccc; /* Set border color */
        padding: 8px 16px; /* Apply padding */
        display: inline-block; /* Ensure it's inline */
        border-radius: 5px; /* Apply border radius */
    }
</style>


<div class="pagination-container">
    @if ($paginator->hasPages())
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"><span>&laquo;</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                {{-- Array of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li class="{{ $page == $paginator->currentPage() ? 'active' : '' }}">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
                <li class="disabled"><span>&raquo;</span></li>
            @endif
        </ul>
    @endif
</div>
