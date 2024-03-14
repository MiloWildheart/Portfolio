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
    background: #FF2800; /* Set the background color for the submit button */
    color: #fff; /* Text color */
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
    :root {
  --color-one: #52117d;
  --color-two: #a944ec;
  --color-three: #ffc800;
  --color-accent: #666673;
  --color-text: ##414051;
}

.lns-checkbox {
  display: inline-flex;
  color: var(--color-text);
  font-size: 0.5rem;
  font-weight: 200;
  align-items: center;
  line-height: 1;
  border-radius: 5px;
  padding: 5px 7px 5px 7px;
  user-select: none;
  margin-top:5px;
}

@media (min-width: 692px) {
  .lns-checkbox {
    font-size: 0.9rem;
  }
}

.lns-checkbox span {
  position: relative;
  display: flex;
  align-items: center;
}

.lns-checkbox input[type="checkbox"] {
  position: absolute;
  clip: rect(0.5px, 0.5px, 0.5px, 0.5px);
  padding: 0;
  border: 0;
  height: 0.5px;
  width: 0.5px;
  overflow: hidden;
}

.lns-checkbox input[type="checkbox"]:checked + span::after {
  background-color: var(--color-accent);
}

.lns-checkbox input[type="checkbox"]:checked + span {
  color: var(--color-accent);
}

.lns-checkbox input[type="checkbox"]:focus + span::before {
  border-color: var(--color-accent);
}

.lns-checkbox span::before {
  content: "";
  display: inline-block;
  border-radius: 2px;
  background-color: #222021;
  margin-right: 8px;
  height: 12px;
  width: 12px;
  border: 1px solid transparent;
}

.lns-checkbox span::after {
  content: "";
  display: inline-block;
  height: 10px;
  width: 10px;
  border-radius: 2px;
  background-color: transparent;
  left: 2px;
  position: absolute;
}
</style>
<x-admin-nav>
<div class="container">
    <h1 class="glassmorphism-title">Make a new item!</h1>

    <div class="glassmorphism-card mt-2 p-4">
        <div class="card-body">
            <form id="contact-form" role="form" action="{{ route('Portfolio-items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf    
            <div class="controls">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description *</label>
                        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="image">Image *</label>
                        <input type="file" name="image" class="form-control" id="image" name="image" value="{{ old('image') }}">
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="font-semibold">Tags</label>
                    @foreach ($tags as $tag)
                        <label class="lns-checkbox ml-2" style="background-color:{{$tag->color}};">
                        <input type="checkbox" name="tags" value="{{ $tag->id }}">
                        <span>{{ $tag->name }}</span>
                        </label> 
                    @endforeach
                    </div>  
                
                    <div class="form-group">
                    <label for="link">link *</label>
                        <input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}">
                        @if ($errors->has('link'))
                            <span class="text-danger">{{ $errors->first('link') }}</span>
                        @endif
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