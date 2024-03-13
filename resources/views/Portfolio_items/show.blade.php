@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Portfolio Item
                </div>
                <div class="float-end">
                    <a href="{{ route('Portfolio-items.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $portfolioItem->name }}
                    </div>
                </div>

                <div class="row">
                    <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $portfolioItem->description }}
                    </div>
                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label text-md-end text-start"><strong>Image:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        @if ($portfolioItem->image)
                            <img src="{{ asset('storage/app/public/Images/' . $portfolioItem->image) }}" alt="Portfolio Item Image">
                        @else
                            No image available
                        @endif
                    </div>
                </div>

                <div class="row">
                    <label for="link" class="col-md-4 col-form-label text-md-end text-start"><strong>Link:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $portfolioItem->link }}
                    </div>
                </div>

                <div class="row">
                    <label for="tags" class="col-md-4 col-form-label text-md-end text-start"><strong>Tags:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        @foreach ($portfolioItem->tags as $tag)
                            {{ $tag->name }}@if (!$loop->last), @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>    
</div>
@endsection
