@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">Portfolio Item List</div>
            <div class="card-body">
                <a href="{{ route('Portfolio-items.create')}}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Portfolio Item</a>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">name</th>
                            <th scope="col">description</th>
                            <th scope="col">image</th>
                            <th scope="col">link</th>
                            <th scope="col">Tags</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($portfolioItems as $portfolioItem)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $portfolioItem->name }}</td>
                                <td>{{ $portfolioItem->description }}</td>
                                <td>{{ $portfolioItem->image }}</td>
                                <td>{{ $portfolioItem->link }}</td>
                                <!-- <td>{{ $portfolioItem->tags }}</td> -->
                                <td>
                                    <form action="{{ route('portfolio-items.destroy', $portfolioItem->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('Portfolio-items.show', $portfolioItem->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                        <a href="{{ route('Portfolio-items.edit', $portfolioItem->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Portfolio Item?');"><i class="bi bi-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
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
</div>
@endsection