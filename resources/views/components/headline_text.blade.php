<Style>
.hero {
  width: 100vw;
  height: 100vh;
  text-align: center;
  color: #CCC;
  position: relative;
  text-transform: uppercase;
  font-family: 'Amatic SC', sans-serif;
  letter-spacing: 17.5px;
}

.hero-one {
  top: 0;
  position: absolute;
  width: 60%;
  background-color: black;
  height: 100vh;
  clip-path: polygon(0 0, 60vw 0, 40vw 100vh, 0 100vh);
  z-index: 1;
  background-image:linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url({{ asset('images\header1.jpg') }});
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
  background-image: linear-gradient(rgba(0,0,0,.2), rgba(0,0,0,.5)), url({{ asset('images\header2.jpg') }});
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
  font-size: 2em;
  display: block;
  font-weight: 700;
}
</Style>

<div class="headline">
<div class='hero'>
  <div class="hero-one"></div>
  <div class="hero-two"></div>
  <h1 class="header-title"><span class="header-primary">Fungi</span><span class="header-sub">and the underground secrets</span></h1>
</div>
</div>