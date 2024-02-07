<head>
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,600i&display=swap" rel="stylesheet">
</head>

<style >
.infocardContainer > html body {
  background-color: black;
  margin: 0 0 0 0;
}
.infocardContainer * {
  font-family: 'Fira Sans Condensed', sans-serif;
  font-weight: 300;
}
.infocardContainer > h2 {
  font-weight: 600; font-style: italic; font-family: "Fira Sans Condensed", sans-serif;
}
.infocardContainer > header {
  height: 2em;
  background-color: #111122;
  margin: 0 0 0 0;
  padding: auto;
  font-size: 2em;
  text-align: center;
  line-height: 2em;
  color: white;
}
.infocardContainer > a {
  text-decoration: none;
}
.infocardContainer > a:visited {
  color: #555566;
}
.infocardContainer > a:hover {
  text-decoration: underline;
}
.infocardContainer {
  display: flex;
  height: 200px;
  width: 200px;
  border-radius: 100px;
  background: rgb(136, 8, 8);
  background: linear-gradient(121deg, rgba(255, 255, 255, 0) 13%, rgba(136, 8, 8, 1) 100%);
  margin: auto;
  margin-top: 300px;
  margin-bottom: 30px;
  overflow: hidden; /* Hide overflow to prevent content from spilling out */
  transition: all 500ms ease-in-out; /* Apply transition to the entire container */
}

.infocardContainer:hover {
  width: 500px;
  border-radius: 100px 10px 100px 100px;
  opacity: 0.9;
}

.infocardContainer:hover #main {
  opacity: 1; /* Set the opacity of the left side */
}

.infocardContainer:hover #textbois {
  opacity: 1; /* Set the opacity of the right side */
}

.infocardContainer #main img {
  height: 180px;
  width: 180px;
  transition: transform 0.3s ease; /* Add transition to the image */
}


.infocardContainer div {
  text-color: white;
  flex-shrink: 1;
  width: 100%;
  --background-color: green;
}
.infocardContainer div * {
  display: flex;
  --flex: inherit;
  overflow: hidden;
  text-overflow: hidden;
  --background-color: yellow;
  color: white;
  white-space: nowrap;
  width: 0;
  height: auto;
  transition: all 250ms ease-in;
  transition-delay: 700ms;
}
.infocardContainer:hover div *{
  --background-color: purple;
  display: flex;
  visibility: visible;
  transition: all 200ms ease-out;
  transition-delay: 300ms;
  width: 100%;
  height: auto;
}

.infocardContainer #main, .infocardContainer #main img{
  --background-color: red;
  height: 200px;
  width: 200px;
  padding-right: 10px;
  border-radius: 100%;
  flex-shrink: 0;
  object-fit: cover;
}
.infocardContainer #main img{
  height: 180px;
  width: 180px;
  transition: none;
  display: float;
  position: relative;
  border: 10px solid white;
  margin: 0 0 0 0; padding: 0 0 0 0;
}
.infocardContainer #textbois {
  position: relative;
}
.infocardContainer #textbois #hotlinks {
  max-width: 60%;
  max-height: 30px;
  
  --background-color: white;
  position:absolute;
  bottom: 5px;
  display: flex;
  justify-content: space-between;
  border-radius: 13px;
}
.infocardContainer #textbois #hotlinks * {
  background-color: white;
  max-width: 30px;
  --margin: 0 1px 0 1px;
  border-radius: 25px;
}

</style>

<div class="infocardContainer">
  <div id="main">
    <img src="{{ asset('images\profile.png') }}"></img>
  </div>
  <div id="textbois">
    <h2>Robin Knol</h2>
    <h4>Junior Web Developer</h4>
    <a href="mailto:limecicila@gmail.com">Robinknol7@gmail.com</a>
    <div id="hotlinks">
      <a href="https://codepen.io/LIMESTA"><img id="codepenio" src="https://blog.codepen.io/wp-content/uploads/2012/06/Button-Fill-Black-Small.png" target="_blank"></img>
      </a>
      <a href="https://codepen.io/LIMESTA">
        <img id="codepenio" src="https://blog.codepen.io/wp-content/uploads/2012/06/Button-Fill-Black-Small.png" target="_blank"></img>
      </a>
      <a href="https://codepen.io/LIMESTA">
        <img id="codepenio" src="https://blog.codepen.io/wp-content/uploads/2012/06/Button-Fill-Black-Small.png" target="_blank"></img>
      </a>
    </div>
  </div>
</div>


<script>
  window.addEventListener('scroll', function() {
    var title = document.querySelector('.hero__title');
    // Calculate the opacity based on the scroll position
    var opacity = 1 - window.scrollY / 500; // Adjust the value (500) for desired speed

    // Ensure opacity is within the range [0, 1]
    opacity = Math.min(Math.max(opacity, 0), 1);

    // Apply the calculated opacity to the title
    title.style.opacity = opacity.toString();
  });
</script>