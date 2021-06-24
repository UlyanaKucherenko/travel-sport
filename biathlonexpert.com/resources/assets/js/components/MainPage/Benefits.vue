<template>
  <section class="benefits">
    <div class="anchor" id="tips" />

    <div class="container">
      <SectionHeader
        class="benefits-header"
        :title="vocab[locale].title"
      />

      <div class="benefits-grid">
        <div class="benefits-mockup">
          <img
            class="benefits-mockup__bg-circles"
            src="/img/benefits-mockup-circles.svg" alt=""
          >
          <img
            class="benefits-mockup__img img-fluid"
            src="/img/benefits-mockup.png" alt=""
          >
        </div>


        <div class="benefits-info-list">
          <div
            class="benefits-info-item"
            v-for="(item, index) in vocab[locale].items" :key="index"
          >
            <img
              class="benefits-info-item__icon"
              src="/img/benefits-icon.svg" alt=""
            >

            <div class="benefits-info-item__text">
              <div class="benefits-info-item__title">
                {{ item.title }}
              </div>

              <div class="benefits-info-item__desc">
                {{ item.desc }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import vocab from '../../translates/sections/benefits';
import SectionHeader from '../SectionHeader'

export default {
  name: "benefits",
  components: {SectionHeader},
  props: {
    locale: {
      type: String,
      require: true
    }
  },
  data() {
    return {
      vocab: vocab,
    };
  },
}
</script>

<style lang="scss">
  .benefits {
    padding: var(--section-offset) 0;
    margin-bottom: calc(var(--section-offset) * 2);

    &-header {
      max-width: 544px;
    }

    &-grid {
      display: flex;
      justify-content: space-between;
      align-items: center;

      @media (max-width: 991px) {
        align-items: flex-start;
      }
    }

    &-info {
      &-list {
        width: 55%;
        display: grid;
        grid-template-columns: 1fr;
        column-gap: calc(var(--space-unit) * 4);
        row-gap: 30px;

        @media (max-width: 991px) {
          grid-template-columns: 1fr;
        }

        @media (max-width: 767px) {
          grid-template-columns: 1fr 1fr;
          width: 100%;
        }

        @media (max-width: 500px) {
          grid-template-columns: 1fr;
        }
      }

      &-item {
        display: flex;
        align-items: flex-start;
        font-size: var(--text-20);

        &__icon {
          margin-right: 15px;
        }

        &__title {
          margin-bottom: 10px;
          font-weight: 700;
          color: var(--color-green);
        }

        &__desc {
        }
      }
    }

    &-mockup {
      position: relative;
      width: 38%;

      @media (max-width: 767px) {
        display: none;
      }

      &__img {
        border-radius: 20px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.3);
      }

      &__bg-circles {
        position: absolute;
        bottom: 0;
        left: 0;
        z-index: -1;
        width: 50%;
        transform: translate(-34%, 31%);

        @media (max-width: 1300px) and (min-width: 1200px) {
          display: none;
        }

        @media (max-width: 1075px) and (min-width: 992px) {
          display: none;
        }

        @media (max-width: 800px) {
          display: none;
        }
      }
    }
  }
</style>
