<template>
  <section class="hero" id="hero">
    <div class="bg"></div>
    <div class="hero__container container">
      <div class="row">
        <div class="hero__title offset-md-1 col-md-10">
          {{ vocab.title }}
        </div>
      </div>
      <a href="#about" class="hero__btn btn-base btn-base--reversed">{{ vocab.btnTitle }}</a>
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
  margin-bottom: calc(var(--space-unit) * 18);

  &__container {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: #FFFFFF;
    text-align: center;
    font-family: (var(--font-default));
  }

  &__title {
    line-height: 150%;
    margin-bottom: calc(var(--space-unit) * 4.8);
    font-size: calc(var(--space-unit) * 3.4);
    letter-spacing: -0.025em;
  }

}
</style>
