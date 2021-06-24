<template>
  <section class="about-duathlon">
    <div class="anchor" id="about-duathlon"/>
    <div class="about-duathlon__container container">
      <div class="about-duathlon__title section-title">
        {{ vocab.title }}
      </div>
      <div class="row">
        <div class="about-duathlon__text offset-md-3 col-md-6">
          {{ vocab.text }}
        </div>
      </div>
      <div class="row">
        <div class="offset-md-1 col-md-10">
          <div class="about-duathlon__list">
            <div
                class="about-duathlon__item"
                v-for="item in 2"
                :key="`item-`+ item"
            >
              <div class="about-duathlon__item-title">{{ vocab.listContent["title" + item] }}</div>
              <div class="about-duathlon__item-descr">{{ vocab.listContent["text" + item] }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import vocab from "../../translates/sections/aboutDuathlon";

export default {
  name: "aboutDuathlon",
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
.about-duathlon {
  margin-top: var(--section-offset);
  margin-bottom: calc(var(--space-unit) * 20);

  &__title {
    letter-spacing: 0.0025em;
  }

  &__text {
    text-align: center;
    margin-bottom: calc(var(--space-unit) * 6.6);
  }

  &__list {
    display: grid;
    justify-content: center;
    width: fit-content;
    margin: 0 auto;
    border-radius: 3px;
    grid-template-columns: repeat(2, 1fr);
    column-gap: 30px;

    @media (max-width: 1230px) {
      grid-template-columns: 1fr;
      max-width: 500px;
      width: 100%;

      row-gap: 23px;
      margin: 0 auto;
    }
  }

  &__item {
    &-title {
      font-size: 33px;
      line-height: 148%;
      letter-spacing: 0.0025em;
      color: #FFFFFF;
      margin-bottom: var(--space-unit);
    }

    &-text {
      line-height: 146%;
      letter-spacing: 0.005em;
      color: #F4F4F4;
    }
  }


}
</style>
