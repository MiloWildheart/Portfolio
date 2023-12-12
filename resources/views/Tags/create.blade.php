<x-layout>
    <x-admin-card class="mb-2">
    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-5">Create New Tag</h3>
    <a href="{{ route('Tags.index') }}" class="bg-green-700 text-white px-4 py-2 rounded-md ml-auto mt-2 mr-2 mb-2">&larr; Back</a>
    </x-admin-card>
    <x-admin-card>
        <form action="{{ route('Tags.store') }}" method="post">
            @csrf
            <div class="mb-3 row mt">
                <label for="name" class="font-semibold bottom-1 text-slate-800 ">Name</label>
                    <div class="col-md-6">
                    <input type="text" class="w-full h-10 px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:border-blue-500 form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
            </div>

            <div class="mb-3 row mt">
                <label for="color" class="font-semibold bottom-1 text-slate-800 ">Color</label>
                <div class="col-md-6">
                    <select name="color" id="color" class="w-full h-10 px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:border-blue-500 form-select @error('color') is-invalid @enderror">
                        <option value="" disabled selected>Select a color</option>
                        @foreach (\App\Models\Tag::getColorOptions() as $value => $label)
                            <option value="{{ $value }}" {{ old('color') === $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('color'))
                        <span class="text-danger">{{ $errors->first('color') }}</span>
                    @endif
                </div>
            </div>

            <div class=" row">
                <input type="submit" class="bg-green-700 text-white px-4 py-2 rounded-md ml-auto mt-2 mr-2" value="Add Tag">
            </div>
    </x-admin-card>
</x-layout>