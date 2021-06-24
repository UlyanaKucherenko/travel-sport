<template>
  <section class="tips" id="tips">
    <div class="tips__container container">
      <div class="row">
        <div class="offset-md-1 col-md-10">

          <div class="tips__title section-title">{{ vocab.title }}</div>
          <div class="tips__descr">{{ vocab.descr }}</div>
          <div class="tips__list">
            <div
                class="tips__item"
                v-for="item in 2"
                :key="`item-${item}`">
              <div class="tips__second-title section-title">{{ vocab.listContent["title" + item] }}</div>
              <div class="tips__text">
                {{ vocab.listContent["text" + item] }}
              </div>
              <div class="tips__tip"> {{ vocab.listContent["tip" + item] }}</div>
              <div class="tips__text">
                {{ vocab.listContent["tipText" + item] }}
              </div>
            </div>
          </div>
          <div class="tips__title section-title">{{ vocab.title3 }}</div>
          <div class="tips__text">{{ vocab.text3 }}</div>
          <div class="tips__text tips__text-end">{{ vocab.text4 }}</div>

          <div class="tips__wrap">
            <div class="register__text">{{ vocab.textRegistr }}</div>
            <a href="#plans" class="register__btn btn-base btn-base--reversed btn-base--fit-width">{{ vocab.btn }}</a>
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
  padding: calc(var(--space-unit) * 17) 0 calc(var(--space-unit) * 20);

  @media (max-width: 991px) {
    padding: calc(var(--space-unit) * 10) 0 calc(var(--space-unit) * 10);
  }

  &__container {
    display: flex;
    flex-direction: column;
  }

  &__title {
    text-align: center;
  }

  &__descr {
    font-size: 23px;
    line-height: 147%;
    margin-bottom: calc(var(--space-unit) * 12);
  }

  &__list {
    margin-bottom: calc(var(--space-unit) * 12.4);
  }

  &__item {
    &:first-child {
      margin-bottom: calc(var(--space-unit) * 12.4);
    }
  }

  &__tip {
    font-weight: 500;
    font-size: 23px;
    line-height: 34px;
    color: #2E2E2E;
    margin-bottom: calc(var(--space-unit) * 1.8);
  }

  &__text {
    line-height: 146%;
    letter-spacing: 0.005em;
    color: #505050;
    margin-bottom: calc(var(--space-unit) * 2.4);
    &-end {
      margin-bottom: calc(var(--space-unit) * 6.2);
    }
  }

  &__wrap {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;

    @media (max-width: 1000px) {
      display: flex;
      flex-direction: column;
    }
  }
}
</style>
