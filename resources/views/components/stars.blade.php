<style>
    @media screen and (max-width: 750px) {
        .star {
            animation: fall var(--fall-duration) var(--fall-delay) linear infinite;
        }
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: radial-gradient(ellipse at bottom, #0d1d31 0%, #0c0d13 100%);
        overflow: hidden;
    }

    .stars {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 120%;
        transform: rotate(-45deg);
    }

    .star {
        position: absolute;
        top: var(--top-offset);
        left: 0;
        width: var(--star-tail-length);
        height: var(--star-tail-height);
        color: var(--star-color);
        background: linear-gradient(45deg, currentColor, transparent);
        border-radius: 50%;
        filter: drop-shadow(0 0 6px currentColor);
        transform: translate3d(104em, 0, 0);
        animation: fall var(--fall-duration) var(--fall-delay) linear infinite;
    }

    .star::before,
    .star::after {
        position: absolute;
        content: '';
        top: 0;
        left: calc(var(--star-width) / -2);
        width: var(--star-width);
        height: 100%;
        background: linear-gradient(45deg, transparent, currentColor, transparent);
        border-radius: inherit;
        animation: blink 2s linear infinite;
    }

    .star::before {
        transform: rotate(45deg);
    }

    .star::after {
        transform: rotate(-45deg);
    }

    @keyframes fall {
        to {
            transform: translate3d(-30em, 0, 0);
        }
    }

    @keyframes tail-fade {
        0%, 50% {
            width: var(--star-tail-length);
            opacity: 1;
        }

        70%, 80% {
            width: 0;
            opacity: 0.4;
        }

        100% {
            width: 0;
            opacity: 0;
        }
    }

    @keyframes blink {
        50% {
            opacity: 0.6;
        }
    }
</style>
<div class="stars">
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  <div class="star"></div>
  {{$slot}}
</div>