<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');

    *,
    *:before,
    *:after {
      box-sizing: border-box;
    }

    .range {
      position: relative;
      background-color: #333;
      width: 100%;
      max-width: 250px;
      height: 30px;
      margin: 0 auto;
      transform: skew(100deg);
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
      background-color: #f34900;
      z-index: 0;
      animation: load .5s forwards linear;
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
   
    @keyframes load {
      to {
        width: var(--width);
      }
    }
</style>
@props(['data', 'dataSource'])
<div >{{$data->name }}</div>
<div class="range" style="--p:{{$data->proficiency}}"> <!-- make progress align with dataset and $data -->
  
</div>
