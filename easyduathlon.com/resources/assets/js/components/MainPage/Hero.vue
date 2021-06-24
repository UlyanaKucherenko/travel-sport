<template>
  <section class="hero" id="hero">
    <div class="bg"></div>
    <div class="container hero__container">
          <div class="hero__title">
            {{ vocab.title }}
          </div>
          <div class="hero__text">
            {{ vocab.text }}
          </div>
          <a href="/member" class="hero__btn btn-base btn-base--reversed">{{ vocab.btnHero }}</a>

        </div>
  </section>
</template>

<script>
import vocab from "../../translates/sections/hero";

export default {
  name: "hero",
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
.hero {
  height: 100vh;
  min-height: 700px;
  max-height: 1200px;
  color: var(--color-white);
  //margin-bottom: calc(var(--space-unit) * 10);

    &__container {
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #F4F4F4;
    text-align: center;
    font-family: (var(--font-default));
  }

  &__title {
    font-size: calc(var(--space-unit) * 6);
    font-weight: 700;
    color: var(--white);
    letter-spacing: -0.005em;
    margin-bottom: calc(var(--space-unit) * 4.8);
  }

  &__text {
    font-size: calc(var(--space-unit) * 3.4);
    margin-bottom: calc(var(--space-unit) * 4);
  }
}
</style>
