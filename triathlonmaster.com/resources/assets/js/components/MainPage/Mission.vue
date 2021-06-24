<template>
  <section class="mission" id="mission">
    <div class="mission__container container">
      <div class="row">
        <div class="mission__title section-title offset-sm-0 col-sm-12 offset-md-1 col-md-10">
          {{ vocab.title }}
        </div>

        <div class="mission__list offset-sm-0 col-sm-12 offset-md-2 col-md-8">
          <div
              v-for="(text, index) in vocab.items"
              class="mission__item"
          >
            <img
                class="mission__item-icon"
                :src="`/img/mission-icon-${index+1}.svg`" alt=""
            >

            <div class="mission__item-text"
                 v-html="text"
            />
          </div>
        </div>
        <div class="mission__membership offset-sm-0 col-sm-12 offset-md-2 col-md-8">
          <div class="mission__membership-text col-sm-12 col-md-6">
            {{ vocab.wantDesign }}
          </div>
          <a href="#plans" class="mission__membership-btn btn-base">{{ vocab.btnMembership }}</a>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import vocab from "../../translates/sections/mission";

export default {
  name: "mission",
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
};
</script>

<style lang="scss">
.mission {
  position: relative;
  z-index: 0;
  text-align: center;
  margin-bottom: calc(var(--space-unit) * 15);

  &__title {
    margin-bottom: calc(var(--space-unit) * 3.2);
  }

  &__list {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  &__item {
    display: flex;
    align-items: center;
    margin-bottom: calc(var(--space-unit) * 3);
    @media (max-width: 767px) {
      flex-direction: column;
    }

    &-icon {
      width: 48px;
      height: 48px;
      margin-right: calc(var(--space-unit) * 2.5);

      @media (max-width: 767px) {
        margin-bottom: calc(var(--space-unit) * 3);
      }

    }

    &-text {
      line-height: 118%;
      font-size: 16px;
      letter-spacing: 0.005em;
      text-align: left;
    }
  }

  &__membership {
    display: flex;
    justify-content: space-between;
    align-items: center;

    &-text {
      text-align: left;

      @media (max-width: 767px) {
        margin-bottom: calc(var(--space-unit) * 1.5);
      }
    }

    @media (max-width: 767px) {
      flex-direction: column;
      align-items: center;
    }
  }
}


</style>
