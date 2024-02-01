<style>
    .gallery {
  --z: 100px;  /* control the zig-zag  */
  --s: 360px; /* control the size */
  --g: 8px;   /* control the gap */
  
  display: grid;
  gap: var(--g);
  width: calc(2*var(--s) + var(--g));
  grid-auto-flow: column;
}
.gallery > img {
  width: 0;
  min-width: calc(100% + var(--z)/2);
  height: 200px;
  object-fit: cover;
  -webkit-mask: var(--mask);
          mask: var(--mask);
  cursor: pointer;
  transition: .5s;
}
.gallery > img:hover {
  width: calc(var(--s)/2);
}
.gallery > img:first-child {
  place-self: start;
  clip-path: polygon(0 0, 100% 0, 100% 100%, calc(2*var(--z)) 100% ,0 100%);
  --mask: 
    conic-gradient(from -135deg at right,#0000,#000 1deg 89deg,#0000 90deg) 
      50%/100% calc(2*var(--z)) repeat-y;
}
.gallery > img:last-child {
  place-self: end;
  clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
  --mask: 
    conic-gradient(from   45deg at left ,#0000,#000 1deg 89deg,#0000 90deg) 
      50% calc(50% - var(--z))/100% calc(2*var(--z)) repeat-y;
}

.container {
  
  
  display: grid;
  place-content: center;
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

<div class="container">
<div class="gallery ">
  <img src="https://assets.codepen.io/1480814/archer.jpg" alt="Archer from Fate/Stay">
  <img src="https://assets.codepen.io/1480814/saber.jpg" alt="Saber from Fate/Stay">
</div>
</div>