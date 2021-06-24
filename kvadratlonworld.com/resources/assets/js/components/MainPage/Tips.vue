<template>
  <section class="tips">
    <div class="container">
      <div class="tips__container">
        <div class="tips__title section-title">{{ vocab.title }}</div>
        <div class="tips__list">
          <div class="tips__item row">
            <div class="offset-md-1 col-md-10">
              <div class="tips__item-title">{{ vocab.mainTexts['secondTitle1'] }}</div>
              <div class="tips__item-text">{{ vocab.mainTexts['text1'] }}</div>
            </div>
          </div>

          <div class="tips__item row">
            <div class="offset-md-1 col-md-10">
              <div class="tips__item-title">{{ vocab.mainTexts['secondTitle2'] }}</div>
              <div class="tips__item-text">{{ vocab.mainTexts['text2'] }}</div>
            </div>
          </div>

          <div class="tips__item row">
            <div class="offset-md-1 col-md-10">
              <div class="tips__item-title">{{ vocab.mainTexts['secondTitle3'] }}</div>
              <div class="tips__item-text mb-2">{{ vocab.mainTexts['text3'] }}</div>
              <div class="tips__item-text">{{ vocab.mainTexts['text4'] }}</div>
            </div>
          </div>
          <div class="tips__item row">
            <div class="offset-md-1 col-md-10 d-flex justify-content-end">
              <a href="/member" class="hero__btn btn-base btn-base--reversed">{{ vocab.btn }}</a>
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
}
</script>

<style lang="scss">
.tips {
  margin-bottom: calc(var(--space-unit) * 20);

  &__container {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  &__list {
  }

  &__item {
    margin-bottom: calc(var(--space-unit) * 6.4);

    &:last-child {
      margin-bottom: 0;
    }
  }

  &__item-title {
    font-size: calc(var(--space-unit) * 2.4);
    font-family:  var(--poppins);
    font-weight: 500;
    line-height: 160%;
    margin-bottom: calc(var(--space-unit) * 1);
  }

  &__item-text {
    font-size: 16px;
    line-height: 160%;
    letter-spacing: 0.005em;
  }
}

</style>
