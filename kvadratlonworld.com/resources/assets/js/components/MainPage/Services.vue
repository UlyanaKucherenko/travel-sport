<template>
  <section class="services" id="services">
    <div class="container">
      <div class="row services__container">
        <div class="offset-sm-0 col-sm-12 offset-md-1 col-md-10">
          <div class="services__title section-title">{{ vocab.title }}:</div>
          <div class="services__list">
            <div
                v-for="(text, index) in vocab.textContent"
                class="services__item"
            >
              <img
                  class="services__item-img"
                  :src="`/img/services-Icon-${index+1}.svg`" alt=""
              >
              <div
                  class="services__item-text"
                  v-html="text"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import vocab from "../../translates/sections/services";

export default {
  name: "services",
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
.services {
  background-color: #5E9978;
  padding-top: calc(var(--space-unit) * 12);
  padding-bottom: calc(var(--space-unit) * 13.6);
  margin-bottom: calc(var(--space-unit) * 15);
  color: #FFFFFF;

  &__container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  &__title {
    margin-bottom: calc(var(--space-unit) * 4.3);
  }

  &__list {
    display: grid;
    grid-template-columns: repeat(5, 1fr);

    @media (max-width: 767px) {
      display: grid;
      grid-row-gap: 20px;
      grid-template-columns: 1fr 1fr;
    }

    @media (max-width: 450px) {
      grid-template-columns: 1fr;
    }
  }

  &__item {
    align-items: center;
    display: flex;
    flex-direction: column;
    text-align: center;

    &-img {
      margin-bottom: 26px;
      width: 48px;
      height: 48px;
    }
  }
}

</style>
