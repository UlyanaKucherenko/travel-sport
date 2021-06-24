<template>
  <section class="about" id="about">
    <div class="container about__container">
      <div class="about__title section-title">{{ vocab.title }}</div>
      <div class="row">
        <div
          class="about__descr section-descr offset-md-1 col-md-10"
          v-html="vocab.descr"
        />
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
  padding-top: calc(var(--section-offset) * 2);
  margin-bottom: calc(var(--space-unit) * 22);

  &__container {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }
}
</style>
