<template>
  <section class="workout">
    <div class="container">
      <div class="row workout__container">
        <div class="offset-sm-0 col-sm-12 offset-md-1 col-md-10">
          <h2 class="workout__title section-title">
            {{ vocab.title }}
          </h2>
          <div class="workout__list">
            <div
              class="workout__item"
              v-for="item in 7"
              :key="`item-`+ item"
            >
              <div class="workout__item-title">{{ vocab.textContent["title" + item] }}:</div>
              <div class="workout__item-descr">{{ vocab.textContent["text" + item] }}</div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </section>
</template>

<script>
import vocab from "../../translates/sections/workout";

export default {
  name: "workout",
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
.workout {
  margin-bottom: calc(var(--space-unit) * 20);

  &__list {
    display: grid;
    justify-content: center;
    width: fit-content;
    margin: 0 auto;
    border-radius: 3px;
    grid-template-columns: repeat(2, 1fr);
    column-gap: 30px;
    row-gap: 32px;

    @media (max-width: 1230px) {
      grid-template-columns: 1fr;
      max-width: 500px;
      width: 100%;

      row-gap: 32px;
      margin: 0 auto;
    }
  }

  &__item-title {
    font-weight: 500;
    font-size: 23px;
    line-height: 147%;
    color: #F4F4F4;
    margin-bottom: var(--space-unit);

  }

  &__item-descr {
    font-size: 15px;
    line-height: 146%;
    letter-spacing: 0.005em;
    color: #F4F4F4;
  }
}

</style>