<style scoped>
    /**code by Arby on codepen */
    @import 'https://unpkg.com/open-props' layer(design.system);
/* Source code of these utilities: https://github.com/mobalti/layout-craft/blob/main/lib/utilities.css */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@200..700&display=swap');
@import 'https://www.unpkg.com/layout-craft@1.0.1/dist/utilities.css'
  layer(base.utilities);

@layer base.app {
  *,
  ::before,
  ::after {
    box-sizing: border-box;
  }

  :where(:not(dialog)) {
    margin: 0;
    padding: 0;
  }
  
  :root {

    --surface-1: oklch(0.17 0 0);
    --surface-2: oklch(0.24 0 0);
    --text-1: oklch(0.97 0 0);
    --text-2: oklch(0.57 0 0);
  }

}

@layer components.Recommendation {
  .SectionRecommendation {
    /* Adjust the inline size from here */
    --_content: 570px;

    /* 15px */
    font-size: 0.9375rem;

    border-block: var(--border-size-1) solid oklch(0.97 0 0 / 0.15);
    padding-block: var(--size-3);
    position: relative;
    margin-inline: auto;
    isolation: isolate;

    :where(a, button, p, span, h2) {
      font-size: inherit;
      color: inherit;
    }

    :where(button) {
      border: unset;
      cursor: pointer;
      font-family: inherit;
    }

   h2 {
      font-weight: var(--font-weight-5);

      @media (width < 700px) {
        padding-inline-start: 0.75rem;
      }
    }
    .UserList {
      list-style: none;
      overflow-x: auto;
      overscroll-behavior-x: contain;
      scroll-snap-type: x mandatory;
      scroll-behavior: smooth; /* Hide scrollbar */
      -ms-overflow-style: none; /* IE and Edge */
      scrollbar-width: none; /* Firefox */
      &::-webkit-scrollbar {
        display: none;
      }
       @media (width < 700px) {
        padding-inline: 0.75rem;
        scroll-padding-inline: 0.75rem;
      }
    }
    .Card {
      scroll-snap-align: start;
      background-color: var(--surface-2);
      border-radius: 10px;
      padding: var(--size-4);
      position: relative;
      inline-size: 156px;
      block-size: 204px;
      padding: 0.875rem;
      text-decoration: none;
      figcaption {
        --_gap: 0.2ex;
      }
      img {
        --size: 80px;
        block-size: var(--size);
        inline-size: var(--size);
        border-radius: var(--radius-round);
        background: var(--gradient-8);
      }
      .Name {
        color: var(--text-1);
        font-weight: var(--font-weight-6);
      }

      .Username {
        color: var(--text-2);
      }
      :is(.Name, .Username) {
        max-inline-size: 100%;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        &:hover {
          text-decoration: underline;
        }
      }
      .RemoveBtn {
        background: transparent;
        border: unset;
        border-radius: var(--radius-round);
        position: absolute;
        inset-inline-end: var(--size-2);
        inset-block-start: 0.75rem;
        scale: 0.8;
        cursor: pointer;
      }
      .FollowButton {
        background-color: var(--text-1);
        color: var(--surface-1);
        font-weight: var(--font-weight-5);
        padding-inline: var(--size-5);
        border-radius: 10px;
        padding-block: var(--size-2);
        inline-size: 100%;
      }
    }
    .Controls {
      position: absolute;
      inset-inline: calc(var(--size-9) * -1);
      block-size: 204px;
      z-index: -1;
      .Wrapper {
        --_content: 700px;
      }
      @media (width < 768px) {
        display: none;
      }
    }
    .ControlsBtn {
      inline-size: 44px;
      block-size: 44px;
      padding: 0.75rem;
      border-radius: var(--radius-round);
      background-color: var(--surface-2);
      color: var(--text-2);
      transition: 0.2s ease;
      opacity: 0;

      &:hover {
        scale: 1.07;
      }
      &:active {
        scale: 1.03;
      }   
    }

    &:hover {
      .ControlsBtn {
        opacity: 1;
      }
    }

  
  }
  @layer scrollDrivenAnimation {
    .SectionRecommendation {
      body & {
        timeline-scope: --carousel;
      }
      .Scroller {
        scroll-timeline: --carousel inline;
      }
      .next {
        animation: auto next ease forwards;
        animation-timeline: --carousel;
      }
      .previous {
        animation: auto prev ease forwards;
        animation-timeline: --carousel;
      }
    }

    @keyframes prev {
      from {
        visibility: hidden;
      }
    }
    @keyframes next {
      to {
        visibility: hidden;
      }
    }
  }
}

</style>

@props(['data', 'dataSource'])

    <section class="SectionRecommendation block content-3">
      <div class="block gap-2 content-full">
        <div class="inline">
          <ul id="scroller" class="UserList Scroller inline gap-1">@foreach ($data as $item)
            <li>
              <a href="#" class="Card block-center-center gap-1">
                
                <figure class="block-center-center gap-1">
                  <picture>
                    <source srcset="https://raw.githubusercontent.com/mobalti/open-props-interfaces/main/recommendation-carousel/images/img-1.avif" type="image/avif" />
                    <img
                      src="https://raw.githubusercontent.com/mobalti/open-props-interfaces/main/recommendation-carousel/images/img-1.webp"
                      alt=""
                      width="80"
                      height="80"
                    />
                  </picture>
                  <figcaption class="block-center-center gap-1">
                    <div class="Name">{{$item->workplace}}</div>
                    <div class="Username">{{$item->start_date}} - {{$item->end_date}} </div>
                  </figcaption>
                </figure>
                <button class="FollowButton">More detail</button>
              </a>
            </li>
      @endforeach
           
          </ul>
          <div class="Controls block-center-center">
            <div class="inline content-3 space-between content-full">
              <button
                id="PrevBtn"
                class="ControlsBtn previous"
                aria-label="Previous item"
                title="Previous item"
                onclick="scroller.scrollBy(-500, 0)"
              >
                <svg
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                >
                  <path d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
              </button>
              <button
                id="NextBtn"
                class="ControlsBtn next"
                aria-label="Next item"
                title="Next item"
                onclick="scroller.scrollBy(500, 0)"
              >
                <svg
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                >
                  <path d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>