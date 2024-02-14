<style scoped>
    .Work {
        align-items: center;
        width: 90vw; /* Set width to 90% of viewport width */
        max-width: 700px; /* Set maximum width */
        margin: 0 auto; /* Center the container */
    }
    .Work > h1 {
        text-align: center;
        font-family: 'Fira Sans Condensed';  
    }
    .Work > p {
        text-align: justify;
        font-family: 'Fira Sans Condensed';
        font-size: 1em;
        margin-bottom: 1.5em;
        width: 100%; /* Occupy full width of the container */
    }
</style>

<div class="Work">
    <h1>{{ $SectionTitle }}</h1>
    <p class="text-balance">{{ $SectionText }}</p>
    <div class="SectionLink">
        {{ $SectionLink }}
    </div>
</div>