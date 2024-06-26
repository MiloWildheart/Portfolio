<x-layout>

    <x-admin-card class="mb-2">

        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-5">Edit Portfolio Item</h3>

        <a href="{{ route('Portfolio-items.index') }}" class="bg-green-700 text-white px-4 py-2 rounded-md ml-auto mt-2 mr-2 mb-2"> Back</a>

    </x-admin-card>

    <x-admin-card>

        <form action="{{ route('Portfolio-items.update', $portfolioItem->id) }}" method="POST">
            @csrf
            
 
            <div class="mb-3 row mt">
                <label for="name" class="font-semibold bottom-1 text-slate-800">Name:</label>
                <div class="col-md-6">
                <input type="text" class="w-full h-10 px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:border-blue-500 form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $portfolioItem->name }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            <!-- Add other form fields here -->

            <div class="mb-3 row">
            <label for="description" class="font-semibold bottom-1 text-slate-800">Description:</label>
                <div class="col-md-6">
                <textarea class="w-full h-32 px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:border-blue-500 form-control @error('description') is-invalid @enderror " id="description" name="description" value="{{ $portfolioItem->description }}">{{ $portfolioItem->description }} </textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                </div>
            </div>

            <div class="mb-3 form-group">
    <label for="image" class="font-semibold bottom-1 text-slate-800">Image:</label>
    <div class="col-md-6">
        <!-- Display current image -->
        <img src="{{ url($portfolioItem->image) }}" alt="Current Image" class="w-32 h-32 rounded mt-2 mb-3">

        <!-- Input for uploading a new image -->
        <input type="file" name="image" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-100 form-control @error('image') is-invalid @enderror" id="image">
        
        @if ($errors->has('image'))
            <span class="text-danger">{{ $errors->first('image') }}</span>
        @endif
    </div>
</div>

                    <div class="mb-3 row">
                        <label for="link" class="font-semibold bottom-1 text-slate-800">link:</label>
                        <div class="col-md-6">
                          <input type="text" class="w-full h-10 px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:border-blue-500 form-control form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ $portfolioItem->link }}">
                            @if ($errors->has('link'))
                                <span class="text-danger">{{ $errors->first('link') }}</span>
                            @endif
                        </div>
                    </div>

                <div class=" row">
                <input type="submit" class="bg-green-700 text-white px-4 py-2 rounded-md ml-auto mt-2 mr-2" value="edit Portfolio item">
                
            </div>

        </form>

    </x-admin-card>

</x-layout>