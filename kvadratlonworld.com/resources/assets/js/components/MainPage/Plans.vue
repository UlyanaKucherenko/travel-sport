<template>
  <section class="plans" id="plans">
<!--    <div class="anchor" id="plans"/>-->

    <div class="container">
      <div class="plans__title section-title">{{ vocab.title }}</div>

      <div class="plans-list">

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
            class="plans-list-item__btn btn-base btn-base--fit-width"
            :href="`/member/${plan.slug}`"
          >
            {{ vocab.btnSelectPlan }}
          </a>
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

  &__title {
    text-align: center;
    margin-bottom: calc(var(--space-unit) * 6);
  }

  &-list {
    position: relative;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    column-gap: 15px;

    @media (max-width: 991px) {
      grid-template-columns: 1fr;
      max-width: 500px;
      width: 100%;
      row-gap: 15px;
      margin: 0 auto;
    }

    @media (max-width: 767px) {
      box-shadow: 0 0 5px #0000000f;
    }

    &-item {
      display: flex;
      flex-direction: column;
      padding: calc(var(--space-unit) * 2.4) calc(var(--space-unit) * 5.8);
      background: var(--plans-bg);
      color: #2E2E2E;
      align-items: center;
      text-align: center;
      border-radius: 8px;

      &__img {
        margin-bottom: calc(var(--space-unit) * 3);
      }

      &__title {
        font-size: 24px;
        //letter-spacing: 0.04em;
        margin-bottom: calc(var(--space-unit) * 2);
      }

      &__price {
        font-size: calc(var(--space-unit) * 4.8);
        font-weight: 600;
        line-height: 1;
        margin-bottom: calc(var(--space-unit) * 0.8);
      }

      &__trial {
        font-size: 12px;
        margin-bottom: calc(var(--space-unit) * .8);
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

  &__benefits-list {
    align-items: center;
    display: flex;
    flex-direction: column;
    margin-bottom: calc(var(--space-unit) * 8.6);
  }

  &-benefits-item {
    display: flex;
    margin-bottom: 8px;

    &:last-child {
      margin-bottom: 0;
    }

    &__icon {
      margin-right: 10px;
    }

    &__text {
      font-size: 15px;
      letter-spacing: 0.005em;
    }

  }
}
</style>
