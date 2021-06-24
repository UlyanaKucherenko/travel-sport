<template>
  <section class="register">
    <div class="container">
      <div class="row register__container">
        <div class="offset-md-1 col-md-10">
          <div class="wrap-register register__wrap">
            <div class="register__text">{{ vocab.text }}</div>
            <a href="#plans" class="register__btn btn-base btn-base--reversed btn-base--fit-width">{{ vocab.btn }}</a>
          </div>

          <div class="register__title section-title text-center">
            {{ vocab.title }}
          </div>
          <div class="register__list">
            <div
                class="register__item"
                v-for="item in 5"
                :key="`item-${item}`"
            >
              {{ vocab.listContent["text" + item] }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import vocab from "../../translates/sections/register";

export default {
  name: "register",
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

.register {

  &__wrap {
    margin-bottom: calc(var(--space-unit) * 12);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;

    @media (max-width: 1000px) {
      display: flex;
      flex-direction: column;
    }
  }

  &__text {
    font-weight: 500;
    font-size: calc(var(--space-unit) * 2.4);
    line-height: 150%;
    color: #2E2E2E;
    @media (max-width: 1000px) {
      margin-bottom: calc(var(--space-unit) * 2);
    }

  }

  &__btn {
    color: white;
    max-width: 224px;
  }

  &__list {

  }

  &__item {
    position: relative;
    padding-left: 15px;

    &:before {
      content: "";
      display: block;
      background-color: black;
      height: 4px;
      width: 4px;
      border-radius: 50%;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      position: absolute;
    }
  }
}

</style>