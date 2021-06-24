<template>
  <section class="choose-us">
    <div class="container">
      <div class="row choose-us__container">
        <div class="offset-md-1 col-md-10">
          <div class="choose-us__title section-title">
            {{ vocab.title }}
          </div>
          <div class="choose-us__text">
            {{ vocab.text }}
          </div>
          <a href="/member" class="btn-base btn-base--reversed">{{ vocab.btn }}</a>
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
      require: true
    }
  },
  data() {
    return {
      vocab: vocab[this.locale],
    };
  },
}
</script>

<style lang="scss">
.choose-us {
  margin-bottom: calc(var(--space-unit) * 26);

  &__container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    @media (max-width: 768px) {
      text-align: center;
    }
  }

  &__title,
  &__text {
    text-align: left;
    @media (max-width: 768px) {
      text-align: center;
    }
  }

  &__text {
    margin-bottom: calc(var(--space-unit) * 2.4);
  }
}
</style>