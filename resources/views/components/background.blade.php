 

<style>
    body {
        margin: 0;
        padding: 0;
    }
 .hero >  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.hero {
  width: 100vw;
  height: 100vh;
  color: #CCC;
  position: relative;
}

.hero-one {
  top: 0;
  position: absolute;
  width: 60%;
  background-color: black;
  height: 100vh;
  clip-path: polygon(0 0, 60vw 0, 40vw 100vh, 0 100vh);
  z-index: 1;
  background-image:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)),  url({{ asset('images/header1.jpg') }});
    background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}
.hero-two {
  position: absolute;
  top: 0;
  right: 0;
  width: 60%;
  background-color: green;
  height: 100vh;
  background-image: linear-gradient(rgba(0,0,0,.2), rgba(0,0,0,.5)),  url({{ asset('images/header2.jpg') }});
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

.header-title {
  z-index: 2;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.header-primary {
  
  display: block;
 
}
</style>

<div class='hero'>
    
  <div class="hero-one"></div>
  <div class="hero-two"></div>
 <span class="header-title"> {{$slot}} </span>
</div>