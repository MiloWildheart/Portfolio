 @auth
 <aside
    x-data="{ open: false }"
    @mouseover="open = true"
    @mouseleave="open = false"
    :class="{ 'w-64': open, 'w-10': !open }"
    class="fixed left-0 top-0 h-full bg-gray-500 text-white transition-width duration-300 overflow-hidden"
>

    <ul class="p-4 ">

    <!-- Logo image needs to be changed. -->
        <li class="mb-3">
        <img src="{{ asset('images\LogoDesign-Monsterhatmedia.png') }}" class="w-100 h-30 mr-2" alt="Logo" x-show="open" x-cloak>
        </li>
        <span :class="{ 'opacity-100': open, 'opacity-0': !open }">{{ auth()->user()->name ?? 'Guest' }} </span>
        
        <!-- Home -->
        <li class="mb-1" >
            <a href="" class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-slate-500 rounded-lg hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" x-show="open" x-cloak>
            <img src="{{ asset('images/326656_home_icon.png') }}" class="w-4 h-4" alt="Image" x-show="open" x-show="!open">
            <span :class="{ 'opacity-100': open, 'opacity-0': !open }">home</span>
            </a>
        </li>
        <!-- Portfolio Items -->
        <li class="mb-1" >
            <a href="{{ route('Portfolio-items.index') }}" class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-slate-500 rounded-lg hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" x-show="open" x-cloak>
            <img src="{{ asset('images/326656_home_icon.png') }}" class="w-4 h-4" alt="Image" x-show="open" x-show="!open">
            <span :class="{ 'opacity-100': open, 'opacity-0': !open }">Portfolio Items</span>
            </a>
        </li>
        <!-- Tags -->
        <li class="mb-1" >
            <a href="{{ route('Tags.index') }}" class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-slate-500 rounded-lg hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" x-show="open" x-cloak>
            <img src="{{ asset('images/326656_home_icon.png') }}" class="w-4 h-4" alt="Image" x-show="open" x-show="!open">
            <span :class="{ 'opacity-100': open, 'opacity-0': !open }">Tags</span>
            </a>
        </li>
         
                <!-- Logout not working yet. -->
     <li class="absolute bottom-2" ><form action="{{ route('auth.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            
          
     <button class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-red-500 rounded-lg hover:bg-red-300 dark:bg-red-700 dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-red-600" x-show="open" x-cloak>
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
            </svg>
            Logout
        </button></form>
        </li>
       
    </ul>@endauth
</aside>  