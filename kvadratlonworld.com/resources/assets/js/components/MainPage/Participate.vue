<template>
  <section class="participate" id="participate">
    <div class="container">
      <div class="row participate__container">
        <div class="participate__title section-title">
          {{vocab.title1}}<br>
          {{vocab.title2}}
        </div>
        <div class="participate__content">
          <ul class="participate__list">
            <li class="participate__item offset-md-1 col-md-10">
              <div class="participate__item-title"> {{ vocab.secondTitle[0] }}</div>
              <div class="participate__item-text">{{ vocab.text[0] }}</div>
            </li>
            <li class="participate__item offset-md-1 col-md-10">
              <div class="participate__item-title">{{ vocab.secondTitle[1] }}</div>
              <div class="participate__item-text">{{ vocab.text[1] }}</div>
            </li>
            <li class="participate__item offset-md-1 col-md-10">
              <div class="participate__item-title">{{ vocab.secondTitle[2] }}</div>
              <div class="participate__item-text">{{ vocab.text[2] }}</div>
            </li>
          </ul>
        </div>
      </div>

       <div class="participate__text text-center">{{ vocab.bottomText }}</div>
    </div>
  </section>
</template>

<script>
import vocab from "../../translates/sections/participate";

export default {
  name: "participate",
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

.participate {
  margin-bottom: calc(var(--space-unit) * 18);

  &__container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: calc(var(--space-unit) * 15);
  }

  &__title {
    text-align: center;
    width: 100%;
    margin-bottom: calc(var(--space-unit) * 3.2);
  }

  &__list {
    padding-right: 10px;
  }

  &__item {
    margin-bottom: calc(var(--space-unit) * 3.2);
  }

  &__item-title {
    font-size: calc(var(--space-unit) * 3.3);
    line-height: 140%;
    font-weight: 500;
    letter-spacing: 0.0025em;
    color: #2E2E2E;
    margin-bottom: calc(var(--space-unit) * 1.8);

  }

  &__item-text {
    font-size: 15px;
    line-height: 140%;
    letter-spacing: 0.005em;
    color: #505050;
  }

  &__text {
    text-align: center;
    font-weight: 500;
    font-size: 23px;
    letter-spacing: 0.0025em;
    color: #2E2E2E;
    margin-bottom: calc(var(--space-unit) * 16);
  }
}
</style>
