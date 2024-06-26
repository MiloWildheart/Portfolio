
<x-admin-nav>
<style scoped>
    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 80vh;
    }

    .glassmorphism-title {
        margin-bottom: 40px;
        color: #000; /* Black text color */
    }

    .glassmorphism-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(15.5px);
        -webkit-backdrop-filter: blur(15.5px);
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        max-width: 50%;
        width: 100%;
    }

    .glassmorphism-card .card-body {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 20px; /* Add padding to the card body */
    }

    .glassmorphism-card .form-group label {
        color: #000; /* Black text color */
        font-weight: bold; /* Make labels more pronounced */
        margin-bottom: 10px; /* Align labels a little bit away from the borders */
    }

    .glassmorphism-card .form-group input,
    .glassmorphism-card .form-group textarea {
        background: rgba(255, 255, 255, 1); /* White background */
        border: 1px solid rgba(0, 0, 0, 0.1); /* Visible black border */
        border-radius: 15px;
        color: #000; /* Black text color */
        padding: 10px;
        margin-bottom: 15px;
        width: 100%;
        box-sizing: border-box;
    }

    .glassmorphism-card .form-group input[type="file"] {
        cursor: pointer;
    }

    .glassmorphism-card .btn-send {
        background: linear-gradient(145deg, #00dbde, #fc00ff);
        color: #fff;
        border-radius: 15px;
        padding: 10px;
        margin-top: 20px;
        width: 100%;
        cursor: pointer;
    }

    .glassmorphism-card .btn-send:hover {
        filter: brightness(1.1);
    }

    .glassmorphism-card .text-danger {
        color: #ff5050;
    }
    .glassmorphism-dropdown {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 15px;
    color: #000;
    padding: 10px;
    margin-bottom: 15px;
    width: 100%;
    box-sizing: border-box;
}
</style>
<div class="container">
    <h1 class="glassmorphism-title">Make a new item!</h1>

    <div class="glassmorphism-card mt-2 p-4">
        <div class="card-body">
            <form id="form" action="{{ route('Tags.store') }}" method="POST" role="form">
                @csrf
                <div class="controls">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="color">Tags *</label>
                            <select name="color" id="color" class="w-full h-10 px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:border-blue-500 form-select @error('color') is-invalid @enderror glassmorphism-dropdown">
                                <option value="" disabled selected>Select a color</option>
                                @foreach (\App\Models\Tag::getColorOptions() as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('color'))
                                <span class="text-danger">{{ $errors->first('color') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-send" value="Create new">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</x-admin-nav>