<template>
  <div class="success-block" v-if="showPopup">
    <div class="success-msg">
      <div class="success-msg__close" @click="closePopupHandler">&times;</div>
      <div class="success-msg__text">{{ text }}</div>
    </div>
  </div>
</template>

<script>

export default {
  name: "Popup",
  props: {
    text: {
      type: String,
      default: 'Thank you, form has been send.'
    }
  },
  data() {
    return {
      showPopup: true,
    }
  },
  methods: {
    closePopupHandler() {
      this.showPopup = !this.showPopup;
      this.$emit('changeShows', this.showPopup)
    },
  }
}
</script>

<style scoped>

</style>
