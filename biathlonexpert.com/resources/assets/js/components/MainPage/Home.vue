<template>
  <div class="home">
    <div class="container">
      <div class="home__title section-title">{{ vocab.title }}</div>
      <div class="home__descr">
        <div class="home__list">
          <div
              class="home__item"
              v-for="item in 4"
              :key="`item-`+ item">

            {{ vocab.textContent["text" + item] }}

          </div>
        </div>
        <div class=" home__btn-wrap">
          <a href="#plans" class="home__btn btn-base">{{ vocab.btnStart }}</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import vocab from "../../translates/sections/home";

export default {
  name: "home",
  props: {
    locale: {
      type: String,
      require: true,
    },
  },
  data() {
    return {
      vocab: vocab[this.locale],
    };
  },
}
</script>

<style lang="scss">
.home {
  margin-bottom: calc(var(--space-unit) * 20);

  &__descr {
    font-size: 15px;
    line-height: 147%;
    letter-spacing: 0.005em;
    color: #F4F4F4;
  }

  &__list {
    margin-bottom: calc(var(--space-unit) * 2.4);
  }

  &__btn-wrap {
    display: flex;
    justify-content: flex-end;

    @media (max-width: 575px) {
      justify-content: center;
    }
  }
}
</style>