<template>
  <div
    class="form-checkbox"
    @click="$emit('input', !value)"
  >
    <div
      class="form-checkbox__mark"
      :class="{
        'form-checkbox__mark--has-error': error,
        'form-checkbox__mark--checked': value === true
      }"
    />
    <div class="form-checkbox__text">
      {{ text }}
    </div>
  </div>
</template>

<script>
export default {
  $_veeValidate: {
    value() { return this.value; }
  },

  props: {
    value: Boolean,
    text: String,
    error: Boolean
  }
};
</script>

<style lang="scss">
  .form-checkbox {
    --color: var(--color-checkbox);

    display: flex;
    cursor: pointer;
    user-select: none;
    margin-bottom: 20px;

    &__mark {
      position: relative;
      flex: 0 0 20px;
      height: 20px;
      border-radius: 3px;
      border: 1px solid var(--color);
      margin-right: 10px;
      margin-top: 2px;
      transition: .3s;

      &:before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 10px;
        height: 10px;
        opacity: 0;
        background: var(--color);
        transition: .1s;
      }

      &--has-error {
        box-shadow: 0 0 6px 6px #fb000078;
      }

      &--checked {
        &:before {
          opacity: 1;
        }
      }
    }

    &__text {
      color: black;
    }
  }
</style>
