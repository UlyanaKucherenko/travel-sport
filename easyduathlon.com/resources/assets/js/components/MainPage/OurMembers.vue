<template>
  <section class="our-members">
    <div class="container">
      <div class="row our-members__container">
        <div class="our-members__title section-title col-md-10">{{ vocab.title }}:</div>
        <div class="our-members__slider col-md-10">
          <img
              src="/img/slider-arrow.svg" alt=""
              class="our-members__slider-prev"
              @click="$refs.slick.prev()"
          >
          <img
              src="/img/slider-arrow.svg" alt=""
              class="our-members__slider-next"
              @click="$refs.slick.next()"
          >

          <Slick :options="slickOptions" ref="slick">
            <div
                class="our-members__slide"
                v-for="item in 3"
                :key="`item-${item}`"
            >
              <div class="our-members__slide-content col-md-10 offset-md-1">
                <div>
                  <img :src="`/img/our-members-img-${item}.png`">
                </div>
                <div>
                  <div class="our-members__slider-title">
                    {{ vocab.slideContent["title" + item] }}
                  </div>
                  <div class="our-members__slider-text">
                    {{ vocab.slideContent["text" + item] }}
                  </div>
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
import vocab from "../../translates/sections/ourMembers";

export default {
  name: "ourMembers",
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
.our-members {
  color: #FFFFFF;
  background: #C87356;
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
    display: grid;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
    border-radius: 3px;
    grid-template-columns: 1fr 2fr;
    -moz-column-gap: 15px;
    column-gap: 15px;

    @media (max-width: 600px) {
      grid-template-columns: 1fr;
      max-width: 500px;
      width: 100%;
      row-gap: 15px;
      margin: 0 auto;
      align-items: center;
    }
  }

  &__slider-title {
    font-size: calc(var(--space-unit) * 3.3);
    line-height: 183%;
    letter-spacing: 0.0025em;
    margin-bottom: 8px;
  }

  &__slider-text {
    font-size: 15px;
    line-height: 140%;
    letter-spacing: 0.005em;
  }
}

</style>
