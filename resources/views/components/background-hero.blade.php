
<style >
    /* Base
----------------------------------------------------------- */

.head > *{
  box-sizing: border-box;
}

.head > img{
  width: 100%;
  max-width: 100%;
  margin: 2rem 0;
}

.head > h2{
  font-size: 2.0rem;
  margin-bottom: 2rem;
}

.head >  p{
  line-height: 1.5;
  margin-bottom: 0.6rem;
  font-size: 0.9rem;
  color: #333;
}

/* Base [END]
----------------------------------------------------------- */

/* Hero
----------------------------------------------------------- */
body {
  margin: 0;
  padding: 0;
}
.head > .hero {
  width: 100%;
  padding-bottom: 20%;
  position: relative;
  background-image: url('https://picsum.photos/1000/660');
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  display: flex;
  justify-content: center; /* Center horizontally */
  align-items: flex-start;
}

.head > .hero:before {
  content: '';
  background-color: rgba(150, 80, 30, 0.5);
  display: block;
  width: 100%;
  height: 100%;
  position: absolute;
}

.head > .hero__content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  width: 100%;
  padding-top: 100px; /* Adjust the padding-top value to move the content down */
}

.head > .hero__title {
  font-size: 4rem;
  margin-bottom: 1rem;
  color: white;
  text-align: center;
}
.head > .hero__text {
  font-size: 1.8rem;
  color: white;
}

.head > .hero__image {
  position: absolute;
  top: 0; /* Align the image to the top */
  left: 50%; /* Center horizontally */
  transform: translateX(-50%); /* Center horizontally */
  border: 10px solid white;
  border-radius: 50%; /* Ensure the image is round */
}

/* Hero [END]
----------------------------------------------------------- */

/* Main Content
----------------------------------------------------------- */

head > .main-content {
  max-width: 800px;
  margin: 0 auto;
  padding: 3rem 1.5rem;

  p {
    column-count: 2;

    @media only screen and (max-width: 600px) {
      column-count: 1;
    }
  }
}

/* Main Content [END]
----------------------------------------------------------- */
</style>

<div class="head">
<div class="hero">
  <div class="hero__content">

    <span class="hero__title">{{ $title }}</span>
    <p class="hero__text"></p>
  </div>
</div>
<section class="main-content">
 {{$slot}}
 {{$MContent}}
</section>
</div>