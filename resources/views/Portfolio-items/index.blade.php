@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    @if ($message = Session::get('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @endif

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Portfolio Item List</h3>
        </div>
        <div class="px-4 py-5 sm:p-0">
            <a href="{{ route('Portfolio-items.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md inline-block mb-2">
                <i class="bi bi-plus-circle"></i> Add New Portfolio Item
            </a>
            @forelse ($portfolioItems as $portfolioItem)
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Description</th>
                        <th class="py-2 px-4 border-b">Image</th>
                        <th class="py-2 px-4 border-b">Link</th>
                        <th class="py-2 px-4 border-b">Tags</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $portfolioItem->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $portfolioItem->description }}</td>
                            <td class="py-2 px-4 border-b">{{ $portfolioItem->image }}</td>
                            <td class="py-2 px-4 border-b">{{ $portfolioItem->link }}</td>
                            <!-- <td class="py-2 px-4 border-b">{{ $portfolioItem->tags }}</td> -->
                            <td class="py-2 px-4 border-b">
                                <form action="{{ route('portfolio-items.destroy', $portfolioItem->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('Portfolio-items.show', $portfolioItem->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded-md inline-block mr-1">
                                        <i class="bi bi-eye"></i> Show
                                    </a>
                                    <a href="{{ route('Portfolio-items.edit', $portfolioItem->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded-md inline-block mr-1">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md inline-block" onclick="return confirm('Do you want to delete this Portfolio Item?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <td colspan="6" class="py-2 px-4 border-b">
                            <span class="text-red-500">
                                <strong>No Product Found!</strong>
                            </span>
                        </td>
                    @endforelse
                </tbody>
            </table>

            {{ $portfolioItems->links() }}
        </div>
    </div>
</div>
@endsection


