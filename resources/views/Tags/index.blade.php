<x-layout>

        <x-admin-add>
        <a href="{{ route('Tags.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md ml-auto mt-2 mr-2 mb-2">
                 Add New Tag
            </a>
        </x-admin--add>
@forelse ( $tags as $tag )
           
               <x-admin-card class='mb-1'>
                            <a href="{{ route('Tags.show', $tag) }}" class='text-lg font-semibold text-slate-800 hover:text-slate-600'>Name: {{$tag->name}}</a>
                            <span class='block text-slate-600' style="background-color: {{ $tag->color }}"> Color: {{$tag->color}}</span>
                 </x-admin-card>
            
        @empty
            
                <x-admin-empty-item>
                    <x-admin-empty-text>No Tags Found.</x-admin-empty-text>
                    <!-- <a href="{{route('Tags.index')}}" class='reset-link'> reset criteria</a> -->
                    </x-admin-empty-item>
            
        @endforelse
</x-layout>