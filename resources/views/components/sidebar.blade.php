<aside
    x-data="{ open: false }"
    @mouseover="open = true"
    @mouseleave="open = false"
    :class="{ 'w-64': open, 'w-16': !open }"
    class="fixed left-0 top-0 h-full bg-gray-800 text-white transition-width duration-300 overflow-hidden"
>
    <ul class="p-4">
        <li class="mb-1" x-show="open" x-cloak>
            <a href="{{ route('Portfolio-items.index') }}" class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-900 dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            <span :class="{ 'opacity-100': open, 'opacity-0': !open }">Portfolio Items</span>
            </a>
        </li>
        <li class="mb-1" x-show="open" x-cloak>
            <a href="{{ route('Tags.index') }}" class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-900 dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            <span :class="{ 'opacity-100': open, 'opacity-0': !open }">Tags</span>
            </a>
        </li>
     
    </ul>
</aside> 