<template>
  <section class="useful">
    <div class="container">
      <div class="useful__container">
        <img class="useful__img" src="/img/useful-image.png" alt=""/>
        <div class="useful__text-wrap">
          <div class="useful__title">{{ vocab.title }}</div>
          <div class="useful__text">
            {{ vocab.text }}
          </div>
          <div class="useful__list">
            <div
              class="useful__item"
              v-for="item in 5"
              :key="`item-${item}`">
              {{ vocab.listContent["item" + item] }}
            </div>
          </div>
          <div class="useful__text-footer">{{ vocab.textFooter }}</div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import vocab from "../../translates/sections/useful";

export default {
  name: "useful",
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

.useful {
  background: #C87356;
  padding: calc(var(--space-unit) * 14.4) 0;
  margin-bottom: calc(var(--space-unit) * 20);

  &__container {
    display: grid;
    justify-content: center;
    align-items: center;
    width: fit-content;
    margin: 0 auto;
    border-radius: 3px;
    grid-template-columns: 454px 1fr;
    column-gap: 70px;

    @media (max-width: 1100px) {
      grid-template-columns: 1fr;
      max-width: 500px;
      width: 100%;

      row-gap: 15px;
      margin: 0 auto;
    }
  }

  &__title {
    font-size: 33px;
    line-height: 148%;
    letter-spacing: 0.0025em;
    color: #FFFFFF;
    margin-bottom: 18px;
  }

  &__img {
    width: 100%;

    @media (max-width: 1100px) {
      width: 80%;
    }
    @media (max-width: 600px) {
      display: none;
    }
  }

  &__text {
    color: #F4F4F4;
    margin-bottom: var(--space-unit);
  }

  &__list {
    margin-bottom: var(--space-unit);
  }
}

</style>
