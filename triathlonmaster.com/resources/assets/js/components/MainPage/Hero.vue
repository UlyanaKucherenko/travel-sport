<template>
  <section class="hero" id="hero">
    <div class="bg"></div>
    <div class="hero__container container">
      <div class="hero__title">
        {{ vocab.title }}
      </div>
      <div class="row">
        <div class="hero__btn-wrap offset-md-3 col-md-6">
          <a
              href="/member"
              class="btn-base btn-base--reversed"
          >
            {{ vocab.btnSignUp }}
          </a>
          <a
              href="#chooseus"
              class="hero__btn btn-base"
          >
            {{ vocab.learnMore }}
          </a>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import vocab from "../../translates/sections/hero";

export default {
  name: "hero",
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
};
</script>

<style lang="scss">
.hero {
  height: 100vh;
  min-height: 700px;
  max-height: 1200px;
  color: var(--color-white);
  margin-bottom: calc(var(--space-unit) * 18);

  &__container {
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  &__title {
    line-height: 136%;
    margin-bottom: calc(var(--space-unit) * 4.3);
    font-size: calc(var(--space-unit) * 6);
    letter-spacing: -0.005em;
    font-weight: 600;
  }

  &__btn-wrap {
    display: grid;
    justify-content: center;
    align-items: center;
    grid-template-columns: repeat(2, 1fr);
    gap: calc(var(--space-unit) * 4);
    @media (max-width: 590px) {
      grid-template-columns: 1fr;
    }
  }

  &__btn {
    background: transparent;
    border: 2px solid white;

    &:hover {
      color: black;
      background: #FFFFFF;
      border: 2px solid #FFFFFF;
    }
  }
}
</style>
