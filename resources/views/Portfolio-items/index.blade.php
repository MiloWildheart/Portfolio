<x-layout>
<x-admin-card class='mb-2'>
    <div class="block rounded-lg bg-ash3 p-6 text-center dark:bg-neutral-800 dark:bg-neutral-700">
        <h3 class="text-2xl leading-6 font-medium text-slate-800 mb-6">Portfolio Item list</h3>
        <a href="{{ route('Portfolio-items.create') }}" class="bg-green-300 text-slate-900 hover:bg-green-600 font-bold px-4 py-2 rounded-md ml-auto mt-2 mr-2 mb-2">
            Add New Portfolio Item
        </a>
</div>

    @forelse ($portfolioItems as $portfolioItem) 
    <x-admin-item class='mb-1'>
        <p class='text-lg text-slate-600 font-bold'>Name:</p>
        <a href="{{ route('Portfolio-items.show', $portfolioItem) }}" class='text-lg font-semibold text-slate-800 hover:text-slate-600'>{{ $portfolioItem->name }}</a>
        <img src="{{ $portfolioItem->image }}" alt="image" class="w-32 h-32 rounded mt-2 mb-2">
        <p class='text-md text-slate-600 font-bold'>Description:</p>
        <p class='text-block text-slate-600'>{{ $portfolioItem->description }}</p>
        <p class='text-md text-slate-600 font-bold'>Link:</p>
        <a href="{{ $portfolioItem->link }}" class='block text-blue-500 hover:text-blue-800 mb-4' mb-2>{{ $portfolioItem->link }}</a>
        
        {{-- Edit button --}}
        <form action="{{ route('portfolio-items.edit', ['portfolioItem' => $portfolioItem->id]) }}" method="GET" class="inline">
            @csrf    
            <button type="submit" class="bg-orange-300 text-slate-900 font-bold px-4 py-2 rounded-md mr-2 hover:bg-orange-500">Edit</button>
        </form>

        {{-- Delete button --}}
        <form action="{{ route('portfolio-items.destroy', $portfolioItem) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-400 text-slate-900 font-bold px-4 py-2 rounded-md hover:bg-red-500">Delete</button>
        </form>
        </x-admin-item>
    @empty
       <x-admin-empty-item>
           <x-admin-empty-text>No Portfolio Items Found.</x-admin-empty-text>
       </x-admin-empty-item> 
    @endforelse
    </x-admin-card>
    </x-layout>

