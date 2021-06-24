<template>
  <section class="tips">
    <div class="anchor" id="tips"/>
    <div class="container">
      <div class="tips__container">
        <div class="tips__title section-title">
          {{ vocab.title }}
        </div>
        <div class="tips__list">

          <div
              v-for="item in 4"
              :key="'item-' + item"
              class="tips__item row"
          >
            <div class="tips__item-title offset-md-1 col-md-6">{{ vocab.textContent["listTitle" + item] }}</div>
            <div class="tips__item-text offset-md-1 col-md-10">{{ vocab.textContent["listText" + item] }}</div>
          </div>
        </div>
        <div class="tips__text col-md-8">{{ vocab.text }}</div>
        <div class="tips__btn-wrap">
          <a href="#plans" class="tips__btn btn-base btn-base--reversed">{{ vocab.btnTips }}</a>
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
  margin-bottom: calc(var(--space-unit) * 10);
  padding-top: calc(var(--header-height));

  &__container {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
  }

  &__title {
    text-align: center;
  }

  &__list {
    margin: 0 auto calc(var(--space-unit) * 7.2);
  }

  &__item {
    margin-bottom: calc(var(--space-unit) * 3.2);

    &:last-child {
      margin-bottom: 0;
    }

  }

  &__item-title {
    font-size: calc(var(--space-unit) * 3.3);
    font-weight: 500;
    line-height: 140%;
    letter-spacing: 0.0025em;
    margin-bottom: calc(var(--space-unit) * 2.4);
    color: #2E2E2E;
  }

  &__item-text {
    font-size: 15px;
    line-height: 22px;
    letter-spacing: 0.005em;
    color: #505050;
  }

  &__text {
    margin-bottom: calc(var(--space-unit) * 2.4);
    font-weight: 500;
    text-align: center;
    letter-spacing: 0.0025em;
  }
}
</style>
