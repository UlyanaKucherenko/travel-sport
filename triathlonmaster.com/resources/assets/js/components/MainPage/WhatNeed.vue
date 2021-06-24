<template>
  <section class="what-need">
    <div class="row container">
      <div class="what-need__container offset-md-1 col-md-10">
        <div class="what-need__title section-title">{{ vocab.title }}</div>
        <img src="/img/what-need-img.png" alt="" class="what-need__image">
        <div class="what-need__desc section-desc">
          {{ vocab.desc }}
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import vocab from "../../translates/sections/whatneed";

export default {
  name: "whatNeed",
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
.what-need {
  margin-bottom: calc(var(--space-unit) * 20);
  padding-top: calc(var(--space-unit) * 9.4);

  &__container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: 100%;
  }

  &__image {
    width: 100%;
    margin-bottom: 16px;
  }

  &__desc {
    text-align: left;
  }
}

</style>