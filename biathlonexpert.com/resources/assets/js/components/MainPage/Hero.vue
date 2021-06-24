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
      <div class="">
        <a href="/member" class="hero__btn btn-base btn-base--reversed">{{ vocab.btnHero }}</a>
      </div>
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
};


</script>

<style lang="scss">
.hero {
  height: 100vh;
  min-height: 700px;
  max-height: 1200px;
  color: var(--color-white);
  margin-bottom: calc(var(--space-unit) * 10);

  &__container {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
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
    font-size: calc(var(--space-unit) * 4.8);
    margin-bottom: calc(var(--space-unit) * 4);
  }
}
</style>
