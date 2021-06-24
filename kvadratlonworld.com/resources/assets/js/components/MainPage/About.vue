<template>
  <section class="about" id="about">
    <div class="container about__container">
      <img src="/img/about-image.png" alt="" class="about__image">
      <div class="about__text-content">
        <div class="about__title section-title">{{ vocab.title }}</div>
        <div class="about__descr section-desc">
          {{ vocab.descr }}
        </div>
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
  margin-bottom: calc(var(--space-unit) * 13);
  padding-top: calc(var(--space-unit) * 9.4);

  &__container {
    display: flex;
    align-items: flex-start;
    justify-content: flex-start;

    @media (max-width: 998px) {
      align-items: center;
    }
  }

  &__image {
    margin-right: 50px;
    @media (max-width: 998px) {
      display: none;
    }
  }

  &__title {
    text-align: left;
    margin-bottom: calc(var(--space-unit) * 2.4);
    @media (max-width: 998px) {
      text-align: center;
    }
  }
}
</style>
