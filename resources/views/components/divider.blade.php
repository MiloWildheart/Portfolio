<style scoped>
    .divider {
  font-family: "Share Tech Mono", monospace;
  color: #000;
  font-size: 6vh;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, .45);
  padding-top: 5vh;
  padding-bottom: 2vh;
  display: flex;
  justify-content: center;
  align-items: center;
  
  &::before,
  &::after {
    content: '';
    display: block;
    height: 0.09em;
    min-width: 30vw;
  }
  
  &::before {
    background: linear-gradient(to right, rgba(240,240,240,0), #000);
    margin-right: 4vh;
  }
  
  &::after {
    background: linear-gradient(to left, rgba(240,240,240,0), #000);
    margin-left: 4vh;
  } 
}
</style>

<div class="divider">
{{ $slot }}
</div>