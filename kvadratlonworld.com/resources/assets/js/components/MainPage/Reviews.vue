<template>
  <section class="reviews">
    <div class="container">
      <div class="row reviews__container">
        <div class="offset-sm-0 col-sm-12 offset-md-1 col-md-10">
          <div class="reviews__title section-title">{{ vocab.title }}:</div>

          <div class="reviews__slider col-lg-11">
            <img
                src="/img/slider-arrow.svg" alt=""
                class="reviews__slider-prev"
                @click="$refs.slick.prev()"
            >
            <img
                src="/img/slider-arrow.svg" alt=""
                class="reviews__slider-next"
                @click="$refs.slick.next()"
            >

            <Slick :options="slickOptions" ref="slick">
              <div
                  class="reviews__slide"
                  v-for="( item,index) in vocab.textContent"
              >
                <div class="reviews__slide-content">
                  <img :src="`/img/reviews-image-${index+1}.png`" class="reviews__slide-img" alt="">
                  <div class="reviews__slider-text col-sm-12 col-md-8">
                    {{ item }}
                  </div>
                </div>
              </div>
            </Slick>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Slick from 'vue-slick'
import vocab from "../../translates/sections/reviews";


export default {
  name: "reviews",
  components: {Slick},
  props: {
    locale: {
      type: String,
      require: true,
    },
  },
  data() {
    return {
      vocab: vocab[this.locale],
      slickOptions: {
        arrows: false,
        speed: 1200,
        autoplay: true,
      },
    };
  },

}
</script>

<style lang="scss">
.reviews {
  background-color: #5E9978;
  color: #FFFFFF;
  padding: calc(var(--space-unit) * 11.0) 0 calc(var(--space-unit) * 11.3);
  margin-bottom: calc(var(--space-unit) * 21);

  &__container {
    display: flex;
    justify-content: center;
  }

  &__title {
    margin-bottom: calc(var(--space-unit) * 3.2);
  }

  &__slider {
    --offset: calc(100% + 20px);
    position: relative;

    &-prev, &-next {
      position: absolute;
      width: 16px;
      top: 50%;
      cursor: pointer;
    }

    &-prev {
      right: var(--offset);
      transform: translateY(-50%) rotate(180deg);
    }

    &-next {
      left: var(--offset);
      transform: translateY(-50%);
    }
  }

  &__slide-content {
    display: flex;
    justify-content: center;
    align-items: center;

    @media (max-width: 790px) {
      flex-direction: column;
    }
  }

  &__slide-img {
    @media (max-width: 790px) {
      margin-bottom: 10px;
    }
  }

  &__slide-text {
    font-size: 15px;
    line-height: 140%;
    letter-spacing: 0.005em;
    color: #F4F4F4;
    text-align: left;

  }
}

</style>