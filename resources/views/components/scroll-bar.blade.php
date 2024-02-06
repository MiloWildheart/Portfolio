<style>
  .Navi {
    position: fixed; /* Fixed position to keep it at the top */
    top: 0; /* Position at the top of the viewport */
    left: 0; /* Align to the left */
    right: 0; /* Align to the right */
    width: 100%;
    text-align: center; /* Center its contents */
    z-index: 1000; /* Ensure it stays above other content */
    transition: top 0.3s ease; /* Add transition for top property */
  }

  .Navi.scrolled {
    top: -50px; /* Move the navbar up */
    transition: top 0.3s ease;
  }

  .center-container {
    display: inline-block; /* Use inline-block for centering */
  }

  .Logo {
    width: 10%;
    height: auto; /* Adjust height automatically */
    margin: 0 auto; /* Center the logo horizontally */
    display: block; /* Ensure the logo takes up the full width */
    margin-bottom: 0px;
    margin-top: 0px;
  }

  .Navi > nav {
    max-width: 960px;
    mask-image: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, #ffffff 25%, #ffffff 75%, rgba(255, 255, 255, 0) 100%);
    margin: 0 auto;
    padding-top: 0px;
    padding-bottom: 40px;
  }

  .Navi > nav ul {
    text-align: center;
    background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.2) 25%, rgba(255, 255, 255, 0.2) 75%, rgba(255, 255, 255, 0) 100%);
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.1), inset 0 0 1px rgba(255, 255, 255, 0.6);
  }

  .Navi > nav ul li {
    display: inline-block;
  }

  .Navi > nav ul li a {
    padding: 18px;
    font-family: "Open Sans";
    text-transform: uppercase;
    color: rgba(0, 35, 122, 0.5);
    font-size: 18px;
    text-decoration: none;
    display: block;
  }

  nav ul li a:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1), inset 0 0 1px rgba(255, 255, 255, 0.6);
    background: rgba(255, 255, 255, 0.1);
    color: rgba(0, 35, 122, 0.7);
  }
</style>

<div class="Navi">
  <div class="center-container">
    <img src="{{ asset('images\LogoDesign-Monsterhatmedia.png') }}" alt="Logo" class="Logo">
  </div>
  <nav>
    <ul>
      <li>
        <a href="#">Home</a>
      </li>
      <li>
        <a href="#">About me</a>
      </li>
      <li>
        <a href="#">Portfolio</a>
      </li>
      <li>
        <a href="#">Contact</a>
      </li>
    </ul>
  </nav>
</div>

<script>
 window.addEventListener('scroll', function() {
  var logo = document.querySelector('.Logo');
  var nav = document.querySelector('.Navi');
  if (window.scrollY > 0) {
    // Gradually decrease the opacity of the logo when scrolling down
    logo.style.opacity = 1 - (window.scrollY / 200); // Adjust the value (200) for desired speed
    // Move the nav bar up when scrolling down
    nav.classList.add('scrolled');
  } else {
    // Show the logo when scrolling up
    logo.style.opacity = '1';
    // Remove the 'scrolled' class when scrolling up to the top
    nav.classList.remove('scrolled');
  }
});
</script>
