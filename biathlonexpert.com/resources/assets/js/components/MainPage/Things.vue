<template>
  <section class="things">
    <div class="container">
      <div class="row things__container">
        <div class="things__title section-title col-md-8">{{ vocab.title }}:</div>
        <div class="things__slider col-md-10">
          <img
            src="/img/slider-arrow.svg" alt=""
            class="things__slider-prev"
            @click="$refs.slick.prev()"
          >
          <img
            src="/img/slider-arrow.svg" alt=""
            class="things__slider-next"
            @click="$refs.slick.next()"
          >

          <Slick :options="slickOptions" ref="slick">
            <div
              class="things__slide"
              v-for="item in vocab.textContent"
            >
              <div class="things__slide-content">
                <div class="things__slider-text col-sm-12 col-md-10">
                  {{ item }}
                </div>
              </div>
            </div>
          </Slick>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Slick from 'vue-slick'
import vocab from "../../translates/sections/things";


export default {
  name: "things",
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
.things {
  background-color: #1C3541;
  color: #FFFFFF;
  padding: calc(var(--space-unit) * 14.0) 0 calc(var(--space-unit) * 14.0);
  margin-bottom: calc(var(--space-unit) * 18);

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
    text-align: center;

  }
}

</style>
