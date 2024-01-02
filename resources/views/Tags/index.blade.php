<x-layout>
    <x-admin-card class='mb-2'>
<div class="block rounded-lg bg-ash3 p-6 text-center dark:bg-neutral-800 dark:bg-neutral-700">
    <h3 class="text-2xl leading-6 font-medium text-slate-800 mb-6">Tag list</h3>
        <a href="{{ route('Tags.create') }}" class="bg-green-400 text-slate-900 font-bold px-4 py-2 hover:bg-green-600 rounded-md ml-auto mt-2 mr-2 mb-2">
            Add New Tag
        </a>
</div>


    @forelse ($tags as $tag)
    <x-admin-item class='mb-1 flex items-center'>
        <a href="{{ route('Tags.show', $tag) }}" class='text-lg font-semibold text-slate-800 hover:text-slate-600'>{{ $tag->name }}</a>
        <div class="w-10 h-8 rounded mt-2 mb-3 mr-2 border border-black" style="background-color: {{ $tag->color }}"></div>
       
        {{-- Edit button --}}
        <div class="mt-2 row">
    <form action="{{ route('tags.edit', ['tag' => $tag]) }}" method="GET" class="inline">
        @csrf
        <button type="submit" class="bg-orange-300 text-slate-900 font-bold px-4 py-2 rounded-md mr-2 hover:bg-orange-500">Edit</button>
    </form>


        {{-- Delete button --}}
        <form action="{{ route('tags.destroy', $tag) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-400 text-slate-900 font-bold px-4 py-2 rounded-md hover:bg-red-500">Delete</button>
        </form>
        </div>
    </x-admin-card>
@empty
    <x-admin-empty-item>
        <x-admin-empty-text>No Tags Found.</x-admin-empty-text>
    </x-admin-empty-item>
@endforelse

<div class="flex items-center justify-center mt-4">
        {{ $tags->links('vendor.pagination.tailwind') }}
    </div>
</div>
</x-admin-card>
</x-layout>