@extends('layouts.app')

@section('content')

<div class='container mx-auto mt-8'>
    @if ($message = Session::get('success'))
    <div class='message-success'> 
        <strong class='font-bold'> Success!</strong>
        <span class='block sm:inline'>{{ $message }}</span>
    </div>
    @endif
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-center text-gray-900">Tag Item List</h3>
        </div>
        <div class="px-4 py-5 sm:p-0 flex justify-between border-b  items-center">
            <a href="{{ route('Tags.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md ml-auto mt-2 mr-2 mb-2">
                 Add New Tag
            </a>
        </div>
    <ul>
        @forelse ( $tags as $tag )
            <li class='mb-4'>
                <div class='text-sm rounded-md bg-white p-4 leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10'>
                    <div class='flex flex-wrap items-center justify-between'>
                        <div class='w-full flex-grow sm:w-auto'>
                            <a href="{{ route('Tags.show', $tag) }}" class='tag-name'>{{$tag->name}}</a>
                            <span class='tag-color' style="background-color: {{ $tag->color }}"> {{$tag->color}}</span>
                        </div>
                    </div>
                </div>
            </li>
        @empty
            <li class='mb-4'> 
                <div class='empty-item'>
                    <p class='empty-text'> No Tags found</p>
                    <!-- <a href="{{route('Tags.index')}}" class='reset-link'> reset criteria</a> -->
                </div>
            </li>
        @endforelse
    </ul>

</div>
@endsection