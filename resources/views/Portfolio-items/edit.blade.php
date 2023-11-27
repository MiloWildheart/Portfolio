@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit portfolio item
                </div>
                <div class="float-end">
                    <a href="{{ route('Portfolio-items.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('Portfolio-items.update', $porfolioItem->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ Portfolio-items->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $porfolioItem->description }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                         <label for="image" class="col-md-4 col-form-label text-md-end text-start">Image:</label>
                         <div class="col-md-6">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ $porfolioItem->image }}">
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="link" class="col-md-4 col-form-label text-md-end text-start">link</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ $porfolioItem->link }}">
                            @if ($errors->has('link'))
                                <span class="text-danger">{{ $errors->first('link') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add portfolio Item">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection