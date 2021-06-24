<template>
  <section class="ebooks" id="ebooks">
    <div class="container ">
      <div class="ebooks__container">
        <h2 class="ebooks__title section-title">{{ this.vocab[this.locale].title }}</h2>
        <div class="ebooks__slider">
          <Slick
              class="ebooks__slider-slick"
              ref="slick"
              :options="slickOptions"
          >
            <img src="/img/services-mockup.png" class="ebooks__slide" alt="">
            <img src="/img/services-mockup.png" class="ebooks__slide" alt="">
            <img src="/img/services-mockup.png" class="ebooks__slide" alt="">
            <img src="/img/services-mockup.png" class="ebooks__slide" alt="">
            <img src="/img/services-mockup.png" class="ebooks__slide" alt="">
          </Slick>

          <div class="ebooks__slider-arrows">
            <img
                class="ebooks__slider-arrow"
                src="/img/arrow.svg" alt=""
                @click="prev"
            >
            <img
                class="ebooks__slider-arrows"
                src="/img/arrow.svg" alt=""
                @click="next"
            >
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Slick from 'vue-slick';
import vocab from '../../translates/books_section';
import 'slick-carousel/slick/slick.css';

export default {
  name: "ebooks",
  props: {
    locale: {
      type: String,
      require: true
    }
  },
  components: {Slick},
  data() {
    return {
      slickOptions: {
        slidesToShow: 4,
        slidesToScroll: 1,
        speed: 1200,
        autoplay: true,
        arrows: false,
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 2
            }
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          }]
      },
      vocab: {}
    };
  },
  created() {
    this.vocab = vocab;
  },
  methods: {
    next() {
      this.$refs.slick.next();
    },

    prev() {
      this.$refs.slick.prev();
    },

    reInit() {
      this.$nextTick(() => {
        this.$refs.slick.reSlick();
      });
    },
  }
}
</script>

<style lang="scss">

.ebooks {
  color: #FFFFFF;
  padding: calc(var(--space-unit) * 11.0) 0 calc(var(--space-unit) * 11.3);
  margin-bottom: calc(var(--space-unit) * 15);

  &__container {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  &__title {
    margin-bottom: calc(var(--space-unit) * 3.2);
  }

  &__slider {
    --offset: calc(100% + 20px);
    position: relative;

    &-slick {
      margin-bottom: calc(var(--space-unit) * 4.8);
    }

    &-arrows {
      display: flex;
      justify-content: center;
    }

    &-arrow {
      &:first-child {
        transform: rotate(180deg);
        margin-right: 15px;
      }
    }
  }

  &__slide {
    max-height: 300px;
    object-fit: cover;
  }
}

/* the slides */
.slick-slide {
  margin: 0 27px;
}

/* the parent */
.slick-list {
  margin: 0 -27px;
}

</style>
