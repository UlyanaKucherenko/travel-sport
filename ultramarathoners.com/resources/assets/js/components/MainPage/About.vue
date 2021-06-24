<template>
  <section class="about"  id="about">
<!--    <div class="anchor" id="about"/>-->
    <div class="container">
      <div class="row about__container">
        <div class="about__title section-title offset-md-1 col-md-10">
          {{ vocab.title }}
        </div>
        <div class="about__text section-desc offset-md-1 col-md-10">{{ vocab.text }}</div>
      </div>

    </div>
  </section>
</template>

<script>
import vocab from "../../translates/sections/about";

export default {
  name: "about",
  props: {
    locale: {
      type: String,
      require: true,
    },
  },
  data() {
    return {
      vocab: vocab[this.locale]
    };
  },
};
</script>

<style lang="scss">
.about {
  margin-bottom: calc(var(--space-unit) * 19);
  padding-top: calc(var(--space-unit) * 9.4);

  &__container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    text-align: left;
  }

  &__title,&__text {
    text-align: left;
    @media (max-width: 768px) {
      text-align: center;
    }
  }

  &__title {
    margin-bottom: calc(var(--space-unit) * 2.4);
  }

  &__text {
    letter-spacing: 0.0005em;
    line-height: 150%;
  }

}


</style>
