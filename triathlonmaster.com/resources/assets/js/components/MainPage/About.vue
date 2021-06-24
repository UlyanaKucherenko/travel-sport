<template>
  <section class="about" id="about">
    <div class="container row">
        <div class="about__container offset-md-1 col-md-10">
          <img src="/img/about-img.png" alt="" class="about__image ">
          <div class="about__text-content">
            <div class="about__title section-title">{{ vocab.title }}</div>
            <div class="about__desc section-desc">
              {{ vocab.desc }}
            </div>
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
    flex-direction: row;
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

  &__title,
  &__desc {
    text-align: left;
    @media (max-width: 998px) {
      text-align: center;
    }
  }

  &__title {
    margin-bottom: calc(var(--space-unit) * 2.4);
  }

}


</style>
