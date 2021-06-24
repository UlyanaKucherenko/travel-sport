<template>
  <div class="section-header">
    <div 
      :class="`section-header__title ${classes.title}`"
      :style="{marginBottom: !desc ? 0 : null}"
    >
      {{ title }}
    </div>

    <div :class="`section-header__desc ${classes.desc}`">
      {{ desc }}
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: String,
    desc: String,
    classes: {
      type: Object,
      default: () => ({})
    }
  }
}
</script>

<style lang="scss">
  .section-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: fit-content;
    margin: 0 auto;
    margin-bottom: calc(var(--space-unit) * 8);
    text-align: center;

    &__title {
      color: var(--color-green);
      font-size: var(--text-50);
      font-family: var(--new-york);
      text-transform: capitalize;
      margin-bottom: var(--section-header-title-offset);
    }
  }
</style>