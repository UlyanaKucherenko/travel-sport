<template>
  <section class="choose-us" id="chooseus">
    <div class="container">
      <div class="choose-us__container">
          <div class="choose-us__title section-title">
            {{ vocab.title }}
          </div>
          <div class="row">
            <div class="choose-us__desc section-desc offset-md-1 col-md-10">
              {{ vocab.desc }}
            </div>
          </div>
            <a href="/member" class="choose-us__btn btn-base btn-base--reversed">{{ vocab.btn }}</a>
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
  padding-top: calc(var(--section-offset) * 2);
  margin-bottom: calc(var(--space-unit) * 22);

  &__container {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }
  &__desc {
    margin-bottom: calc(var(--space-unit) * 2.4);

  }
}

</style>