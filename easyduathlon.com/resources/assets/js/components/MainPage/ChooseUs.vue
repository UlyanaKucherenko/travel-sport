<template>
  <section class="choose-us">
    <div class="container choose-us__container">
        <img src="/img/chooseus-image.png" alt="" class="choose-us__image">
        <div class="choose-us__text-content">
          <div class="choose-us__title section-title">{{ vocab.title }}</div>
          <div class="choose-us__descr section-desc">
            {{ vocab.descr }} <a href="/logout" class="choose-us__descr-link">{{ vocab.joinUs }}</a>
          </div>
        </div>
    </div>
  </section>
</template>
<script>
import vocab from "../../translates/sections/chooseus";

export default {
  name: "chooseUs",
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
.choose-us {
  margin-bottom: calc(var(--space-unit) * 23);

  &__container {
    display: flex;
    justify-content: center;
  }

  &__image {
    margin-right: calc(var(--space-unit) * 4.8);
    @media (max-width: 998px) {
      display: none;
    }
  }

  &__text-content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    @media (max-width: 998px) {
      align-items: center;
    }
  }

  &__title {
    text-align: left;
  }

  &__descr {
    text-align: left;
  }

  &__descr-link {
      color: #641a74;
    &:hover {
      color: #d28ae1;
    }
  }
}

</style>