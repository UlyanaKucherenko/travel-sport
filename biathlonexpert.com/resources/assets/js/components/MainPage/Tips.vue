<template>
  <section class="tips" id="tips">
    <div class="tips__container container">
      <div class="tips__title section-title">
        {{ vocab.title }}
      </div>
      <div class="tips__content">
        <img
          class="tips__image"
          src="/img/tips-image.png" alt=""
        >
        <div class="tips-list">
          <div
            class="tips-item"
            v-for="(text, index) in vocab.items"
          >
            <div class="tips-item__text">
              {{ index + 1 }}. {{ text }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import vocab from "../../translates/sections/tips";

export default {
  name: "tips",
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
.tips {

  &__container {
    position: relative;
    padding-top: calc(var(--space-unit) * 5);
    padding-bottom: calc(var(--space-unit) * 5);
  }

  &__title {
    margin-bottom: calc(var(--space-unit) * 3.2);
  }

  &__content {
    display: flex;
    justify-content: center;
  }

  &__image {
    width: 33%;
    margin-right: calc(var(--space-unit) * 4);

    @media (max-width: 767px) {
      display: none;
    }
  }

  &__list {}

  &-item {
    margin-bottom: calc(var(--space-unit) * 3);

    &:last-child {
      margin-bottom: 0;
    }

    &__text {
      font-size: var(--text-16);
      line-height: 140%;
      letter-spacing: 0.005em;
      margin-bottom: var(--space-unit);
    }
  }
}
</style>
