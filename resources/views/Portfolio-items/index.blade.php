<x-layout>
<x-admin-card class='mb-1'>
    <x-admin-add>
        <h3 class="text-2xl leading-6 font-medium text-slate-600">Portfolio Item list</h3>
        <a href="{{ route('Portfolio-items.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-md ml-auto mt-2 mr-2 mb-2">
            Add New Portfolio Item
        </a>
    </x-admin-add>
</x-admin-card>
    @forelse ($portfolioItems as $portfolioItem) 
    <x-admin-card class='mb-1'>
        <a href="{{ route('Portfolio-items.show', $portfolioItem) }}" class='text-lg font-semibold text-slate-800 hover:text-slate-600'>Name: {{ $portfolioItem->name }}</a>
        <img src="{{ $portfolioItem->image }}" alt="image" class="w-32 h-32">
        <p class='block text-slate-600'>{{ $portfolioItem->description }}</p>
        <p class='block text-slate-600'>Link: {{ $portfolioItem->link }}</p>
        
        <form action="{{ route('Portfolio-items.edit', $portfolioItem) }}" method="GET" class="inline">
            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-orange-700">Edit</button>
        </form>

        {{-- Delete button --}}
        <form action="{{ route('portfolio-items.destroy', $portfolioItem) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700">Delete</button>
        </form>
        </x-admin-card>
    @empty
       <x-admin-empty-item>
           <x-admin-empty-text>No Portfolio Items Found.</x-admin-empty-text>
       </x-admin-empty-item> 
    @endforelse
    
    </x-layout>

