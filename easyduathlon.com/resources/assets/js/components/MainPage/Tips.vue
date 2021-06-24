<template>
  <section class="tips">
    <div class="tips" id="tips"/>
    <div class="container tips__container">
      <div class="tips__title section-title">{{ vocab.title }}</div>
      <div class="row">
        <div class="tips__list offset-md-1 col-md-10">
          <div
              class="tips__item section-desc"
              v-for="item in 4"
              :key="`item-`+ item"
          >
            {{ vocab.textContent["text" + item] }}
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Slick from 'vue-slick'
import vocab from "../../translates/sections/tips";

export default {
  name: "tips",
  components: {Slick},
  props: {
    locale: {
      type: String,
      require: true,
    },
  },
  data() {
    return {
      vocab: vocab[this.locale],
      slickOptions: {
        arrows: false,
        speed: 1200,
        autoplay: true,
      },
    };
  },

}
</script>

<style lang="scss">
.tips {
  color: #FFFFFF;
  margin-bottom: calc(var(--space-unit) * 20);

  &__container {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  &__item {
    margin-bottom: 10px;
    text-align: left;
  }

}

</style>
