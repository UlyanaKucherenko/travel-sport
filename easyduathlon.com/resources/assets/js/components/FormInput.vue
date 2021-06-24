<template>
  <label
    class="form-field"
    :class="{'form-field--textarea-fluid': tag === 'textarea' && !rows}"
  >
<!--    <span-->
<!--      v-if="title"-->
<!--      class="form-field__title"-->
<!--      :class="{-->
<!--        'form-field__title&#45;&#45;reversed': reversed,-->
<!--        'form-field__title&#45;&#45;textarea': tag === 'textarea'-->
<!--      }"-->
<!--    >-->
<!--      {{ title }}-->
<!--    </span>-->

    <textarea
      v-if="rows || tag === 'textarea'"
      class="form-field__textarea"
      :class="{
        'form-field__holder--reversed': reversed,
        'form-field__holder--has-error': error,
      }"
      :placeholder="placeholder || title"
      :value="value"
      @input="$emit('input', $event.target.value)"
      :rows="rows"/>

    <the-mask
      v-else-if="mask"
      class="form-field__input"
      :class="{
        'form-field__holder--reversed': reversed,
        'form-field__holder--has-error': error,
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
        'form-field__holder--reversed': reversed,
        'form-field__holder--has-error': error,
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
    maxlength: String,
    value: String,
    title: String,
    placeholder: String,
    mask: String,
    rows: String,
    tag: String,
    error: [String, Boolean],
    reversed: Boolean
  }
}
</script>

<style lang="scss">
.form-field {
  --border-color: #EDF1F4;

  display: block;
  margin-bottom: 20px;
  text-align: left;

  &:last-child {
    margin-bottom: 0;
  }

  &--textarea-fluid {
    display: flex;
    flex-direction: column;

    textarea {
      height: 100%;
    }
  }

  &__error-text {
    color: #ff5f5f;
    font-size: 14px;
  }

  &__title {
    display: block;
    font-size: 14px;

    &--textarea {
      margin-bottom: 10px;
    }

    &--reversed {
      color: black;
    }
  }

  &__input, &__textarea {
    width: 100%;
    font-size: 14px;
    padding: 10px 0;
    background: transparent;
    border: none;
    border-bottom: 1px solid var(--border-color);
    border-radius: 1px;
    transition: .3s;
    color: inherit;
    resize: none;

    &::placeholder {
      color: #EAEAEA;
    }
  }

  //&__textarea {
  //  padding: 15px;
  //}

  &__holder {
    &--has-error {
      --border-color: #c21f1ffc;
    }

    &--reversed {
      color: black;
      --border-color: black;

      &.form-field__input::placeholder {
        color: black;
      }

      &.form-field__holder--has-error {
        --border-color: #c21f1ffc;
      }
    }
  }
}
</style>
