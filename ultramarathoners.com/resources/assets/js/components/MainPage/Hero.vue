<template>
  <section class="hero" id="hero">
    <div class="bg"></div>
    <div class="container">
      <div class="hero__container row">
        <div class="offset-md-1 col-md-11">
          <div class="hero__title">
            {{ vocab.title }}
          </div>
          <div class="hero__author">
            {{ vocab.author }}
          </div>
        </div>
        <a href="#about" class="btn-base btn-base--reversed">{{ vocab.btnTitle }}</a>
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
  margin-bottom: calc(var(--space-unit) * 12);

  &__container {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: #FFFFFF;
    text-align: left;
    font-family: var(--font-default);

    @media (max-width: 768px) {
      text-align: center;
    }
  }

  &__title {
    line-height: 150%;
    font-size: calc(var(--space-unit) * 4.8);
  }

  &__author {
    font-size: calc(var(--space-unit) * 4.8);
    margin-bottom: calc(var(--space-unit) * 4.3);
  }
}
</style>
