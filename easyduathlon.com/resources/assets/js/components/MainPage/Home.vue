<template>
  <div class="home">
    <div class="container">
      <div class="home__title section-title">{{ vocab.title }}</div>
      <div class="home__desc offset-md-1 col-md-10">
        <div class="home__list">
          <div
            class="home__item"
            v-for="item in 2"
            :key="`item-`+ item">

            {{ vocab.textContent["text" + item] }}

          </div>
        </div>
        <a href="#plans" class="home__btn btn-base">{{ vocab.btnStart }}</a>
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

  &__desc {
    font-size: 15px;
    line-height: 147%;
    letter-spacing: 0.005em;
    color: #F4F4F4;
  }

  &__list {
    display: grid;
    grid-gap: 1em;
    margin-bottom: calc(var(--space-unit) * 2.4);
  }

  &__btn {
    background: #FFFFFF;
    color: black;
    display: block;
    margin-left: auto;

    &:hover {
      color: #FFFFFF;
      border: 2px solid #FFFFFF;
      background: transparent;
    }

    @media (max-width: 575px) {
      margin: 0 auto;
    }
  }
}
</style>
