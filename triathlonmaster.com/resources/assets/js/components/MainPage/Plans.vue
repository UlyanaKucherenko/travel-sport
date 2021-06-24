<template>
  <section class="plans" id="plans">
<!--    <div class="anchor" id="plans"/>-->
    <div class="container">
      <div class="row plans__container">
        <div class="plans__title section-title">{{ vocab.title }}</div>

        <div class="plans-list col-12">
          <div
              class="plans-list-item"
              v-for="(plan, index) in plans"
              :key="index"
          >
            <div class="plans-list-item__title">
              {{ plan.plan_text[0].title }}
            </div>

            <div class="plans-list-item__price">{{ plan.price }}€</div>

            <div class="plans__benefits-list">
              <div class="plans-benefits-item">
                <div class="plans-benefits-item__text">
                  {{ plan.plan_text[0].text1 }}
                </div>
              </div>

              <div class="plans-benefits-item">
                <div class="plans-benefits-item__text">
                  {{ plan.plan_text[0].text2 }}
                </div>
              </div>
            </div>

            <div class="plans-list-item__trial">
              {{ plan.plan_text[0].trial }}
            </div>
            <a
                class="plans-list-item__btn btn-base"
                :href="`/member/${plan.slug}`"
            >
              {{ vocab.btnSelectPlan }}
            </a>
          </div>
        </div>

        <div class="plans__text col-12">
          <div class="plans__quote">{{ vocab.quote }}</div>
          <div class="plans__author">{{ vocab.author }}</div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import vocab from "../../translates/sections/plans";
import SectionHeader from "../SectionHeader";

export default {
  name: "plans",
  components: {SectionHeader},
  props: {
    plans: {
      type: Array,
      required: true,
    },
    locale: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      vocab: vocab[this.locale],
    };
  },
};
</script>

<style lang="scss">
.plans {
  margin-bottom: calc(var(--space-unit) * 20);
  padding-top: calc(var(--space-unit) * 9.4);

  &__container {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
  }

  &__title {
    text-align: center;
    margin-bottom: calc(var(--space-unit) * 6);
  }

  &-list {
    width: 100%;
    position: relative;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: calc(var(--space-unit) * 4);
    justify-content: center;
    margin: 0 auto;
    border-radius: 3px;
    margin-bottom: calc(var(--space-unit) * 2);

    @media (max-width: 991px) {
      grid-template-columns: 1fr;
      max-width: 500px;
      width: 90%;
    }

    @media (max-width: 767px) {
      box-shadow: 0 0 5px #0000000f;
    }

    &-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: calc(var(--space-unit) * 3);
      background: var(--plans-bg);
      box-shadow: 0px 8px 12px rgba(33, 65, 114, 0.12);
      color: #000000;

      @media (max-width: 991px) {
        align-items: center;
        text-align: center;
      }

      &__img {
        margin-bottom: calc(var(--space-unit) * 3);
      }

      &__title {
        font-size: var(--text-24);
        letter-spacing: 0.04em;
        margin-bottom: calc(var(--space-unit) * 2);
      }

      &__price {
        font-size: calc(var(--space-unit) * 4.8);
        font-weight: 600;
        line-height: 1;
        margin-bottom: calc(var(--space-unit) * 2);
      }

      &__trial {
        font-size: 12px;
        font-family: var(--open-sans);
        margin-bottom: calc(var(--space-unit) * 1);
      }

      &__btn {
        width: 100%;
        margin-bottom: 7px;
        @media (max-width: 991px) {
          max-width: 300px;
        }
      }
    }
  }

  &__shadow {
    width: 90%;
    position: absolute;
    bottom: 0;
    left: 5%;
    transform: translateY(30%);
    z-index: -1;
  }

  &__benefits-list {
    font-size: 14px;
    margin-bottom: calc(var(--space-unit) * 8.6);
    margin-top: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  &-benefits-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: var(--space-unit);
    text-align: center;

    @media (max-width: 991px) {
      justify-content: center;
    }

    &:last-child {
      margin-bottom: 0;
    }

    &__icon {
      margin-right: 10px;
      margin-top: .3em;
    }
  }

}
</style>
