<template>
  <section class="provide">
    <div class="anchor" id="wedo"/>
    <div class="container">
      <div class="provide__container">
        <div class="provide__title section-title">
          {{ vocab.title }}
        </div>
        <div class="row">
          <div
              class="provide__desc section-desc offset-md-1 col-md-10"
              v-html="vocab.desc"
          />
          <div class="provide__list">
            <div
                class="provide__item"
                v-for="item in 3"
                :key="`item-`+ item"
            >
              <img class="provide__item-img" :src="`/img/provide-${item}.svg`" alt="">
              <div class="provide__item-title">{{ vocab.textContent["title" + item] }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import vocab from "../../translates/sections/provide";

export default {
  name: "provide",
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
.provide {
  margin-bottom: calc(var(--space-unit) * 18);

  &__title {
    margin-bottom: calc(var(--space-unit) * 3.2);
  }

  &__desc {
    margin-bottom: calc(var(--space-unit) * 3.5);
  }

  &__list {
    display: grid;
    justify-content: center;
    width: fit-content;
    margin: 0 auto;
    border-radius: 3px;
    grid-template-columns: repeat(3, 1fr);
    column-gap: 15px;

    @media (max-width: 1230px) {
      grid-template-columns: 1fr;
      max-width: 500px;
      width: 100%;
      row-gap: 23px;
      margin: 0 auto;
    }
  }

  &__item {
    display: flex;
    align-items: center;
    flex-direction: column;

    &-img {
      margin-bottom: calc(var(--space-unit) * 1.6);
    }

    &-title {
      font-weight: 500;
      font-size: calc(var(--space-unit) * 2.4);
      line-height: 150%;
      font-family: var(--poppins);
      text-align: center;
      color: #FFFFFF;
    }
  }

}
</style>
