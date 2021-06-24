<template>
  <section class="choose-us">
    <div class="container choose-us__container">
      <img src="/img/chooseus-img.png" alt="" class="choose-us__image">
      <div class="choose-us__text-content">
        <div class="choose-us__title section-title">{{ vocab.title }}</div>
        <div class="choose-us__descr section-desc">{{ vocab.descr }}</div>
        <div class="">
          <a href="/member" class="choose-us__btn btn-base btn-base--reversed">{{ vocab.btn }}</a>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import vocab from "../../translates/sections/chooseus";

export default {
  name: "chooseUs",
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
}
</script>

<style lang="scss">
.choose-us {
  margin-bottom: calc(var(--space-unit) * 23);

  &__container {
    display: flex;
    justify-content: center;
  }

  &__image {
    margin-right: calc(var(--space-unit) * 4.8);
    @media (max-width: 998px) {
      display: none;
    }
  }

  &__text-content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
    @media (max-width: 998px) {
      align-items: center;
    }
  }

  &__title {
    text-align: left;
  }

  &__descr {
    text-align: left;
    margin-bottom: calc(var(--space-unit) * 3.8);
  }

  &__btn {
    display: block;
  }
}

</style>