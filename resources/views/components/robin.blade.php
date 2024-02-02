<style>
.robinDiv {
  display: flex;
  justify-content: center;
}

.robinH2 {
  font-weight: 400;
  margin: 2rem 0 0.25rem 0;
}

.robinH1 {
  position: fixed;
  right: 1rem;
  bottom: 1rem;
  opacity: 0.5;
  margin: 0;
}

.robinP {
  margin: 0;
}

.robin {
  width: 500px;
  aspect-ratio: 10 / 5;
  --bg: hsl(330 80% calc(90% - (var(--hover) * 10%)));
  --accent: hsl(280 80% 40%);
  transition: background 0.2s;
  background:
    radial-gradient(circle at top left, var(--accent), transparent 75%),
    var(--bg);
  margin: 0;
  position: relative;
  overflow: hidden;
  border-radius: 1.5rem;
}

.robin:after {
  content: "";
  position: absolute;
  width: 20%;
  aspect-ratio: 1;
  border-radius: 50%;
  bottom: 0%;
  left: 10%;
  background: linear-gradient(-65deg, var(--bg) 50%, var(--accent) 50%);
  filter: blur(25px);
  transform:
    translateX(calc(var(--hover) * 15%))
    scale(calc(1 + (var(--hover) * 0.2)));
  transition: transform 0.2s, background 0.2s;
}

.robinImg {
  position: absolute;
  left: 20%;
  top: 15%;
  width: 40%;
  transform:
    translateX(calc(var(--hover) * -15%))
    scale(calc(1 + (var(--hover) * 0.2)));
  transition: transform 0.2s;
}

.robinArticle {
  --hover: 0;
}

.robinArticle:hover {
  --hover: 1;
}
</style>

<div class="robinDiv">
<article class="robinArticle">
  <figure class="robin"><img class="robinImg" src="https://assets.codepen.io/605876/person.png" alt=""></figure>
  <h2 class="robinH2">Mike's mindful morning</h2>
  <p class="robinP">Course • Mindful Mike</p>
</article>

</div>