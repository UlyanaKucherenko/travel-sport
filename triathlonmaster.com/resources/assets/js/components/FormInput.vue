<template>
  <label class="form-field">
    <textarea
      v-if="rows"
      class="form-field__input"
      :class="{
        'form-field__input--reversed': reversed,
        'form-field__input--has-error': error
      }"
      :placeholder="placeholder || title"
      :value="value"
      @input="$emit('input', $event.target.value)"
      :rows="rows"/>

    <the-mask
      v-else-if="mask"
      class="form-field__input"
      :class="{
        'form-field__input--reversed': reversed,
        'form-field__input--has-error': error
      }"
      :placeholder="placeholder || title"
      :value="value"
      @input="$emit('input', $event)"
      :mask="mask"
    />

    <input
      v-else
      class="form-field__input"
      :class="{
        'form-field__input--reversed': reversed,
        'form-field__input--has-error': error
      }"
      :placeholder="placeholder || title"
      :value="value"
      @input="$emit('input', $event.target.value)"
      type="text"
    >

    <span
      class="form-field__error-text"
      v-if="typeof error !== 'boolean'"
    >
      {{ error }}
    </span>
  </label>
</template>

<script>
export default {
  $_veeValidate: {
    value() { return this.value; }
  },

  props: {
    value: String,
    title: String,
    placeholder: String,
    mask: String,
    rows: String,
    error: [String, Boolean],
    reversed: Boolean
  }
}
</script>

<style lang="scss">
  .form-field {
    display: block;
    margin-bottom: 20px;
    text-align: left;

    &:last-child {
      margin-bottom: 0;
    }

    &__error-text {
      color: #ff5f5f;
      font-size: 14px;
    }

    &__input {
      width: 100%;
      font-size: 14px;
      padding: 15px 20px;
      background: transparent;
      border: none;
      border-bottom: 1px solid white;

      border-radius: 0px;
      transition: .3s;
      color: inherit;

      &::placeholder {
        color: white;
      }

      &--has-error {
        border-color: red;
      }

      &--reversed {
        color: black;
        border-color: black;

        &.form-field__input::placeholder {
          color: black;
        }

        &.form-field__input--has-error {
          border-color: #ff0000;
        }
      }
    }
  }
</style>
