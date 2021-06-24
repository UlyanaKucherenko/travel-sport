<template>
  <section class="steps">
    <div class="container">
      <div class="row steps__container">
        <div class="steps__list offset-sm-0 col-sm-12 offset-md-1 col-md-11">
          <div class="steps__item">
            <div class="steps__item-title col-sm-12 col-md-10">{{ vocab.mainTexts['secondTitle1'] }}</div>
            <div class="steps__item-text col-sm-12 col-md-9">{{ vocab.mainTexts['text1'] }}</div>
          </div>
          <div class="steps__item">
            <div class="steps__item-title col-sm-12 col-md-9">{{ vocab.mainTexts['secondTitle2'] }}</div>
            <div class="steps__item-text col-sm-12 col-md-9">{{ vocab.mainTexts['text2'] }}</div>
          </div>
          <div class="steps__item">
            <div class="steps__item-title col-sm-12 col-md-6">{{ vocab.mainTexts['secondTitle3'] }}</div>
            <div class="steps__item-text col-sm-12 col-md-8 mb-3">{{ vocab.mainTexts['text3'] }}</div>
          </div>
          <div class="steps__item">
            <div class="steps__item-title col-sm-12 col-md-6">{{ vocab.mainTexts['secondTitle4'] }}</div>
            <div class="steps__item-text col-sm-12 col-md-6">{{ vocab.mainTexts['text4'] }}</div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import vocab from "../../translates/sections/steps";

export default {
  name: "steps",
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
.steps {
  margin-bottom: calc(var(--space-unit) * 16.7);

  &__container {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  &__list {
    margin-bottom: calc(var(--space-unit) * 15);
  }

  &__item {
    margin-bottom: calc(var(--space-unit) * 6.4);

    &:last-child {
      margin-bottom: 0;
    }
  }

  &__item-title {
    font-size: calc(var(--space-unit) * 3.3);
    font-weight: 500;
    line-height: 49px;
    letter-spacing: 0.0025em;
    color: #2E2E2E;
    margin-bottom: calc(var(--space-unit) * 1.8);
  }

  &__item-text {
    font-size: 15px;
    line-height: 22px;
    letter-spacing: 0.005em;
    color: #505050;
  }

  &__text {
    text-align: center;
    font-weight: 500;
    font-size: 23px;
    letter-spacing: 0.0025em;
    color: #2E2E2E;
  }

}

</style>
