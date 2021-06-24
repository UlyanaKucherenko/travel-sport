<template>
  <section class="back">
    <div class="container">
      <SectionHeader
        :title="vocab.title"
        :desc="vocab.subtitle"
      />

      <div class="back-content">
        <div class="back-info">
          <div class="back-info__desc">{{ vocab.desc }}</div>
          <a
            class="back-info__btn btn-base"
            href="/member"
          >
            {{ vocab.btn }}
          </a>
          <a
            class="back-info__terms"
            href="/terms_conditions"
          >
            {{ vocab.terms }}
          </a>
        </div>

        <img
          class="back-img"
          src="/img/back-img.png" alt=""
        >
      </div>
    </div>
  </section>
</template>

<script>
import vocab from '../../translates/sections/back';
import SectionHeader from '../SectionHeader'

export default {
  name: "back",
  components: {SectionHeader},
  props: {
    locale: {
      type: String,
      required: true
    }
  },
  computed: {
    vocab() {return vocab[this.locale]}
  },
}
</script>

<style lang="scss">
  .back {
    padding: var(--section-offset) 0;

    &-content {
      width: 95%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 0 auto;

      @media (max-width: 991px) {
        align-items: unset;
      }
    }

    &-info {
      width: 45%;

      @media (max-width: 767px) {
        width: 100%;
        text-align: center;
      }

      &__desc {
        font-size: var(--text-20);
        font-weight: 500;
        margin-bottom: calc(var(--space-unit) * 3);
      }

      &__btn {
        margin-bottom: 10px;
      }

      &__terms {
        display: block;
        color: #466DBA;
        font-size: var(--text-18);
      }
    }

    &-img {
      width: 45%;
      border-radius: 20px;
      object-fit: cover;

      @media (max-width: 767px) {
        display: none;
      }
    }
  }
</style>
