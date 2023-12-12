<x-layout>

<x-admin-card class='mb-2'>
    <x-admin-add>
        <h3 class="text-2xl leading-6 font-medium text-slate-600">Tag list</h3>
        <a href="{{ route('Tags.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-md ml-auto mt-2 mr-2 mb-2">
            Add New Tag
        </a>
    </x-admin-add>
</x-admin-card>
    @forelse ($tags as $tag)
    <x-admin-card class='mb-1 flex'>
        <a href="{{ route('Tags.show', $tag) }}" class='text-lg font-semibold text-slate-800 hover:text-slate-600'>{{ $tag->name }}</a>
        
        <div class="w-8 h-8 rounded mr-2 border border-black" style="background-color: {{ $tag->color }}"></div>

        <div class=" mt-2 row">
        <form action="{{ route('Tags.edit', $tag) }}" method="GET" class="inline">
            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-orange-700">Edit</button>
        </form>

        {{-- Delete button --}}
        <form action="{{ route('tags.destroy', $tag) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700">Delete</button>
        </form>
        </div>
    </x-admin-card>
@empty
    <x-admin-empty-item>
        <x-admin-empty-text>No Tags Found.</x-admin-empty-text>
    </x-admin-empty-item>
@endforelse

</x-layout>