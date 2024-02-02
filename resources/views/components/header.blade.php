<style>
  .gallery {
    --z: 100px;
    --s: 360px;
    --g: 8px;
    display: grid;
    gap: var(--g);
    width: calc(2*var(--s) + var(--g));
    grid-auto-flow: column;
    position: relative;
  }

  .gallery > img {
    width: 0;
    min-width: calc(100% + var(--z)/2);
    height: 200px;
    object-fit: cover;
    -webkit-mask: var(--mask);
    mask: var(--mask);
    filter: grayscale(100%);
    cursor: pointer;
    transition: .5s;
  }

  .gallery > img::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    opacity: 0;
    transition: opacity 0.5s;
  }

  .gallery:hover > img::before {
    opacity: 1;
  }

  .gallery > img:hover {
    width: calc(var(--s)/2);
    filter: grayscale(0%);
  }

  .gallery > img:first-child {
    place-self: start;
    clip-path: polygon(0 0, 100% 0, 100% 100%, calc(2*var(--z)) 100% ,0 100%);
    --mask: conic-gradient(from -135deg at right,#0000,#000 1deg 89deg,#0000 90deg) 50%/100% calc(2*var(--z)) repeat-y;
  }

  .gallery > img:last-child {
    place-self: end;
    clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
    --mask: conic-gradient(from   45deg at left ,#0000,#000 1deg 89deg,#0000 90deg) 50% calc(50% - var(--z))/100% calc(2*var(--z)) repeat-y;
  }

  .text-overlay {
    position: absolute;
    color: white;
    font-size: 1.5rem;
    opacity: 0;
    transition: opacity 0.5s;
    pointer-events: none; /* Make sure the overlay doesn't interfere with hover events */
    background: rgba(255, 255, 255, 0.2); /* Glassmorphism background */
    backdrop-filter: blur(10px); /* Adjust the blur as needed */
    border-radius: 10px; /* Adjust the border-radius as needed */
    padding: 10px; /* Adjust the padding as needed */
  }

  .text-overlay.archer {
    top: 50%; 
    left: 45%; /* Adjust the left position for Archer */
    transform: translate(-50%, -50%);
  }

  .text-overlay.saber {
    top: 50%; 
    left: 55%; /* Adjust the left position for Saber */
    transform: translate(-50%, -50%);
  }

  .container {
    display: grid;
    place-content: center;
    position: relative;
  }

  h1 {
    text-align: center;
    font-family: system-ui, sans-serif;
    font-size: 3rem;
    word-spacing: .8em;
  }

  h1 span:first-child {
    color: #af3817;
  }

  h1 span:last-child {
    color: #0b3fa1;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const gallery = document.querySelector('.gallery');
    const textArcher = document.querySelector('.text-overlay.archer');
    const textSaber = document.querySelector('.text-overlay.saber');

    gallery.addEventListener('mouseover', function (event) {
      if (event.target.matches('.gallery > img:first-child')) {
        textArcher.style.opacity = '1';
        textSaber.style.opacity = '0';
      } else if (event.target.matches('.gallery > img:last-child')) {
        textArcher.style.opacity = '0';
        textSaber.style.opacity = '1';
      }
    });

    gallery.addEventListener('mouseout', function () {
      textArcher.style.opacity = '0';
      textSaber.style.opacity = '0';
    });
  });
</script>

<div class="container">
  <div class="gallery">
    <img src="https://assets.codepen.io/1480814/archer.jpg" alt="Archer from Fate/Stay">
    <img src="https://assets.codepen.io/1480814/saber.jpg" alt="Saber from Fate/Stay">
  </div>
  <div class="text-overlay archer">Text for Archer</div>
  <div class="text-overlay saber">Text for Saber</div>
</div>
