<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');

*,
*:before,
*:after {
  box-sizing: border-box;
}

body {
  background-color: #212121;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  color: #ccc;
  font-family: sans-serif;
  font-size: 18px;
}

.range {
  position: relative;
  background-color: #333;
  width: 300px;
  height: 30px;
  transform: skew(30deg);
  font-family: 'Orbitron', monospace;
}

.range:before {
  --width: calc(var(--p) * 1%);
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 0;
  height: 100%;
  background-color: #f3e600;
  z-index: 0;
  animation: load .5s forwards linear, glitch 2s infinite linear;
}

.range:after {
  counter-reset: progress var(--p);
  content: counter(progress) '%';
  color: #000;
  position: absolute;
  left: 5%;
  top: 50%;
  transform: translateY(-50%) skewX(-30deg);
  z-index: 1;
}

.range__label {
  transform: skew(-30deg) translateY(-100%);
  line-height: 1.5;
}

@keyframes load {
  to {
    width: var(--width);
  }
}

</style>

<div class="range" style="--p:60"> <!-- make prgress align with dataset and $data -->
  <div class="range__label">Progress</div>
</div>