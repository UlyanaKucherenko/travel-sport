<template>
  <section class="types">
    <div class="anchor" id="types"/>

    <div class="container">
      <div class="row types__container">
        <div class="types__title offset-lg-3 col-lg-6">
          {{ vocab.title }}
        </div>
        <img
            class="types__image col-lg-12"
            src="/img/typs-image.png" alt=""
        >
      </div>
      <div class="types__text-content offset-md-0 col-md-12 offset-lg-1 col-lg-10">

        <div class="types__row">
            <div class="types__row-text">
              {{vocab.rowText[0]}}
            </div>
            <div class="types__row-text">
              {{vocab.rowText[1]}}
            </div>

        </div>

        <div class="types__row">
          <div class="types__row-title">
            {{vocab.rowTitle[0]}}
          </div>

          <ul class="types__list col-md-12 col-lg-8">
            <li class="types__item col-lg-1" v-for="item in vocab.firstList">
              {{item}}
            </li>
          </ul>

          <div class="types__text col-md-12 col-lg-10">
            {{vocab.rowText[2]}}
          </div>
        </div>

        <div class="types__row">
          <div class="types__row-title">
            {{vocab.rowTitle[1]}}
          </div>
          <ul class="types__list col-md-12 col-lg-9">
            <li class="types__item " v-for="item in vocab.secondList">
              {{item}}
            </li>
          </ul>
        </div>

        <div class="types__row">
          <div class="types__row-title">
            {{vocab.rowTitle[2]}}
          </div>

          <ul class="types__list col-lg-12">
            <li class="types__item " v-for="item in vocab.thirdList">
              {{item}}
            </li>
          </ul>

          <div class="types__text col-lg-10"> {{vocab.rowText[3]}}</div>

          <div class="types__text col-lg-10"> {{vocab.rowText[4]}}</div>

          <div class="types__text col-lg-10"> {{vocab.rowText[5]}}</div>

          <div class="types__text col-lg-10"> {{vocab.rowText[6]}}</div>

          <div class="types__text col-lg-10"> {{vocab.rowText[7]}}</div>
          <div class="types__text col-lg-10"> {{vocab.rowText[8]}}</div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import vocab from '../../translates/sections/types';
import SectionHeader from '../SectionHeader'

export default {
  name: "types",
  components: {SectionHeader},
  props: {
    locale: {
      type: String,
      require: true
    }
  },
  data() {
    return {
      vocab: vocab[this.locale],
    };
  },
}
</script>

<style lang="scss">
.types {
  margin-bottom: calc(var(--space-unit) * 15);

  &__container {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  &__title {
    margin-bottom: calc(var(--space-unit) * 5);
    font-size: 24px;
    line-height: 116%;
    text-align: center;
  }

  &__image {
    margin-bottom: calc(var(--space-unit) * 2);
  }
  &__row {
    margin-bottom: calc(var(--space-unit) * 4.8);
  }

  &__row-title {
    font-size: 24px;
    line-height: 116%;
    margin-bottom: calc(var(--space-unit) * 1.6);
  }

  &__row-text {
    &:first-child {
      margin-bottom: calc(var(--space-unit) * 2);
    }
  }

  &__text {
    margin-bottom: calc(var(--space-unit) * 4);
  }

  &__list {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: calc(var(--space-unit) * 1.6);
  }

  &__item {
    margin-right: calc(var(--space-unit) * 2);
    position: relative;
    padding-left: 10px;

    &:before {
      content: "";
      width: 5px;
      height: 5px;
      display: block;
      position: absolute;
      top: 50%;
      left: 0;
      transform: translateY(-50%);
      background-color: white;
      border-radius: 50%;

    }
  }
}
</style>
