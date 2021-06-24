<template>
  <section class="method">
    <div class="container">
      <div class="container__method row">
        <div class="offset-md-1 col-md-10">
          <div class="method__title section-title">{{ vocab.title }}</div>
          <div class="method__descr">
            <div class="method__list">
              <div
                class="method__item"
                v-for="item in 3"
                :key="`item-`+ item">

                {{ vocab.textContent["text" + item] }}

              </div>
            </div>
            <a href="#plans" class="method__btn btn-base">{{ vocab.btnStart }}</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import vocab from "../../translates/sections/method";

export default {
  name: "method",
  props: {
    locale: {
      type: String,
      require: true,
    },
  },
  data() {
    return {
      vocab: vocab[this.locale],
    };
  },
}
</script>

<style lang="scss">
.method {
  margin-bottom: calc(var(--space-unit) * 20);

  &__container {
    display: flex;
  }

  &__title {
    text-align: left;
    max-width: 690px;
  }

  //&__descr {
  //  line-height: 147%;
  //  letter-spacing: 0.005em;
  //  color: #F4F4F4;
  //}

  &__list {
    margin-bottom: calc(var(--space-unit) * 2.4);
  }

  &__item {
    line-height: 147%;
    letter-spacing: 0.005em;
    color: #F4F4F4;

    &:first-child {
      margin-bottom: var(--space-unit);
    }
  }

  &__btn {
    background: #FFFFFF;
    color: black;
    display: block;
    margin-left: auto;

    &:hover {
      color: #FFFFFF;
      border: 2px solid #FFFFFF;
      background: transparent;
    }

    @media (max-width: 575px) {
      margin: 0 auto;
    }
  }
}
</style>
