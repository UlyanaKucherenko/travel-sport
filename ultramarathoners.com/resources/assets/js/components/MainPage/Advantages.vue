<template>
  <section class="advantages">
    <div class="anchor" id="services"/>
    <div class="container">
      <div class="row advantages__container">
        <img class="advantages__img col-md-4" src="/img/chooseus-img.png" alt="">
        <div class="advantages_text-content col-md-7">
          <div class="advantages__title section-title">{{ vocab.title }}</div>
          <div class="advantages__list">
            <div
                class="advantages__item"
                v-for="item in vocab.textContent"
                :key="`item + ${item}`"
            >
              {{ item }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import vocab from '../../translates/sections/advantages';

export default {
  name: "advantages",
  props: {
    locale: {
      type: String,
      require: true
    }
  },
  data() {
    return {
      vocab: vocab[this.locale],
    };
  },
}
</script>

<style lang="scss">
.advantages {
  margin-bottom: calc(var(--space-unit) * 16);

  &__img {
    display: block;
    object-fit: cover;

    @media (max-width: 767px) {
      max-width: 300px;
      margin: 0 auto 10px;
    }
  }

  &__text-content {
    display: flex;
    align-items: flex-start;
    letter-spacing: 0.0005em;
    line-height: 150%;
  }
  &__title {
    text-align: left;
    @media (max-width: 768px) {
      text-align: center;
    }

  }
  &__item {
    padding-left: 20px;
    position: relative;

    &:after {
      content: "";
      width: 5px;
      height: 5px;
      top: 10px;
      left: 0;
      background:#F4F4F4;
      border-radius: 50%;
      display: block;
      position: absolute;

    }
  }
}
</style>
