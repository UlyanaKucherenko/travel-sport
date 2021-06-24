<template>
  <section class="plans" id="plans">
    <div class="plans__container container">
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

          <div class="plans-list-item__desc">
            {{ plan.plan_text[0].text1 }} <br/>
            {{ plan.plan_text[0].text2 }}
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
  padding: calc(var(--space-unit) * 8) 0 calc(var(--space-unit) * 25);
  width: 100%;

  &__title {
    text-align: center;
    margin-bottom: calc(var(--space-unit) * 6);
  }

  &-list {
    display: grid;
    justify-content: space-between;
    //width: fit-content;
    margin: 0 auto;
    border-radius: 3px;
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
    }

    &-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      padding: calc(var(--space-unit) * 3);
      background: var(--white);
      color: #2E2E2E;

      @media (max-width: 991px) {
        align-items: center;
        text-align: center;
      }

      &__img {
        margin-bottom: calc(var(--space-unit) * 3);
      }

      &__title {
        font-size: 24px;
        font-weight: 700;
        line-height: 147%;
        color: #2E2E2E;
        margin-bottom: calc(var(--space-unit) * 3);
      }

      &__price {
        font-size: calc(var(--space-unit) * 4.8);
        font-weight: 600;
        color: var(--color-primary);
        line-height: 1;
        margin-bottom: calc(var(--space-unit) * 3);
      }

      &__desc {
        margin-top: auto;
        margin-bottom: calc(var(--space-unit) * 8.6);
      }

      &__trial {
        font-size: 14px;
        margin-bottom: 7px;
      }

      &__btn {
        width: 100%;

        @media (max-width: 991px) {
          max-width: 300px;
        }
      }
    }
  }
}
</style>
