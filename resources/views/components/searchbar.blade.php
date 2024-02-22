<style>
    /* Search Container Styles */
    .search__container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 100px; /* Adjust as needed */
        border-radius: 20px; /* Rounded corners */
        background-color: #f0f0f0; /* Background color */
        padding: 20px; /* Padding */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle effect */
        max-width: 800px; /* Maximum width */
        margin: 0 auto; /* Center horizontally */
    }

    /* Search Input Styles */
    .search__input {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 10px; /* Rounded corners */
        box-sizing: border-box;
        font-size: 16px;
    }

    /* Tag Container Styles */
    .tag__container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    /* Tag Item Styles */
    .tag__item {
        margin: 5px;
    }

    /* Checkbox Styles (if needed) */
    input[type="checkbox"] {
        margin-right: 5px;
    }

    /* Label Styles (if needed) */
    label {
        font-size: 14px;
    }
</style>



<!-- Search Container -->
<div class="search__container">
    <!-- Search Input -->
    <input class="search__input" type="text" placeholder="Search">

    <!-- Tag Container -->
    <div class="tag__container">
        <!-- Loop through tags and display checkboxes -->
        @foreach ($tags as $tag)
            <div class="tag__item">
                <input type="checkbox" id="tag_{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
                <label for="tag_{{ $tag->id }}">{{ $tag->name }}</label>
            </div>
        @endforeach
    </div>
</div>
