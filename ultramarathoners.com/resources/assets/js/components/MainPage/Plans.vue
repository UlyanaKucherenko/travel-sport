<template>
  <section class="plans" id="plans">
<!--    <div class="anchor" id="plans"/>-->
    <div class="container">
      <div class="plans__title section-title">{{ vocab.title }}</div>

      <div class="plans__list">
        <img
            class="plans__shadow"
            src="/img/bg-shadow.svg" alt=""
        >

        <div
            class="plans-item"
            v-for="(plan, index) in plans"
            :key="index"
        >

          <div class="plans-item__title">
            {{ plan.plan_text[0].title }}
          </div>

          <div class="plans-item__price">{{ plan.price }}€</div>


          <div class="plans-item__desc">
            {{ plan.plan_text[0].text1 }} <br>
            {{ plan.plan_text[0].text2 }}
          </div>

          <div class="plans-item__trial">
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
  margin-bottom: calc(var(--space-unit) * 26);
  padding-top: calc(var(--space-unit) * 9.4);

  &__list {
    position: relative;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: calc(var(--space-unit) * 1.5);
    justify-content: center;
    margin: 0 auto;
    border-radius: 3px;

    @media (max-width: 991px) {
      grid-template-columns: 1fr;
      max-width: 500px;
      width: 100%;
    }

    @media (max-width: 767px) {
      box-shadow: 0 0 5px #0000000f;
    }
  }

  &-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: calc(var(--space-unit) * 2.4) calc(var(--space-unit) * 5.8);
    background: #FFFFFF;
    box-shadow: 0px 6px 17px rgba(13, 13, 13, 0.4);
    border-radius: 2px;
    line-height: 150%;
    color: black;

    &:nth-of-type(3) {
      .plans-item__icon {
        transform: translateX(8%);
      }
    }

    @media (max-width: 991px) {
      align-items: center;
      text-align: center;
    }

    &__icon {
      margin-bottom: calc(var(--space-unit) * 3);
    }

    &__title {
      font-size: 24px;
      text-align: center;
      letter-spacing: 0.02em;
      margin-bottom: calc(var(--space-unit) * 1.6);
    }

    &__desc {
      text-align: center;
      margin-bottom: calc(var(--space-unit) * 8.6);
      font-size: 16px;
    }

    &__price {
      font-size: calc(var(--space-unit) * 4.8);
      font-weight: 600;
      line-height: 1;
      margin-bottom: var(--space-unit);
    }

    &__trial {
      margin-bottom: var(--space-unit);
      font-size: 12px;
    }

    &__btn {
      width: 100%;
      margin-bottom: 7px;

      @media (max-width: 991px) {
        max-width: 300px;
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
}
</style>
