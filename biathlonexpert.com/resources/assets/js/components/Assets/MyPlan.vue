<template>
  <div class="my-plan">
    <div class="container">
      <div class="my-plan__container">
        <div class="my-plan__title">My plan</div>
        <div class="my-plan__content">
          <div class="my-plan__content-col">
            <span class="my-plan__text">Available Books:</span>
            <span class="my-plan__number">{{ availableBooks }}/{{ totalBooks }}</span>
          </div>
          <div class="my-plan__content-col">
            <span class="my-plan__text">End of Subscription:</span>
            <span class="my-plan__number">{{ expirationData }}</span>
          </div>
          <div class="my-plan__content-col">
            <span class="my-plan__text">Plan:</span>
            <span class="my-plan__number">{{ planName }}</span>
          </div>
        </div>
        <button class="my-plan__btn">
          {{ btnName }}
        </button>
      </div>
    </div>

  </div>

</template>

<script>
import vocab from '../../translates/member_area/myplan';

export default {
  name: "MyPlan",
  props: {
    locale: {
      type: String,
      require: true
    },
    expirationData: {
      type: String,
      require: true
    },
    totalBooks: {
      type: Number,
      require: true
    },
    availableBooks: {
      type: Number,
      require: true
    },
    planName: {
      type: String,
      require: true
    },
    btnName: {
      type: String,
      default: "Upgrade"
    }
  },
  data() {
    return {
      vocab: {},
    }
  },
  created() {
    this.vocab = vocab;
  },
}
</script>

<style lang="scss" scoped>
.my-plan {

  &__container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: flex-start;
    flex-wrap: wrap;
    width: 100%;
    color: white;
    margin-bottom: 83px;
  }

  &__content {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    flex-wrap: wrap;
    margin-bottom: 32px;
  }

  &__content-col {
    margin-right: 48px;

    &:last-child {
      margin-right: 0;
    }
  }

  &__title {
    width: 100%;
    font-size: 34px;
    color: #FFFFFF;
    text-align: left;
    margin-bottom: 24px;
  }

  &__text {
    width: 100%;
    font-size: 24px;
    margin-bottom: 24px;
    color: #F0F0F0;
  }

  &__img {
    path {
      fill: var(--color-member-area);
    }
  }

  &__number {
    font-size: 24px;
    color: var(--color-member-area);
    text-align: right;
  }

  &__btn {
    display: block;
    font-size: 20px;
    font-weight: 600;
    padding: 15px 52px 14px;
    color: #fff;
    background: var(--color-member-area);
    border: 2px solid var(--color-member-area);
    border-radius: 8px;
    box-shadow: 0 4px 23px rgba(var(--color-member-area), 0.5);
    cursor: pointer;

    &:hover {
      border: 2px solid white;
      background-color: transparent;
      transition: all 0.3s ease-out;
    }
  }

}

</style>