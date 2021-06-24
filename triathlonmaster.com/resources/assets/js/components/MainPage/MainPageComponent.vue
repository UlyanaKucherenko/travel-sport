<template>
  <div class="main-page">
    <hero :locale="locale"></hero>
    <chooseUs :locale="locale"></chooseUs>
    <about :locale="locale"></about>
    <whatNeed :locale="locale"></whatNeed>
    <plans :plans="plans" :locale="locale"></plans>
    <contact
        :routes="routes"
        :locale="locale"
        v-if="showContactSection"
        v-on:hideContactSection="hideContactSection"
    ></contact>
  </div>
</template>

<script>
import Popup from "../Popup/Popup";

Vue.component("hero", require("./Hero").default);
Vue.component("chooseUs", require("./ChooseUs").default);
Vue.component("about", require("./About").default);
Vue.component("whatNeed", require("./WhatNeed").default);

Vue.component("steps", require("./Steps").default);
Vue.component("services", require("./Services").default);
Vue.component("ebooks", require("./Ebooks").default);

Vue.component("types", require("./Types").default);
Vue.component("tips", require("./Tips").default);
Vue.component("plans", require("./Plans").default);
Vue.component("customers", require("./Customers").default);
Vue.component("contact", require("./Contact").default);

export default {
  name: "MainPageComponent",
  components: {Popup},
  props: {
    slider_books: {
      type: Array,
      require: true,
    },
    plans: {
      type: Array,
      require: true,
    },
    slider_reviews: {
      type: Array,
      require: true,
    },
    routes: {
      type: Object,
      require: true,
    },
    locale: {
      type: String,
      require: true,
    },
  },
  data() {
    return {
      showContactSection: true,
      showPopup: false,
    };
  },
  methods: {
    hideContactSection() {
      this.showPopup = true;
      this.showContactSection = false;
    },
  },
};
</script>

<style lang="scss">
.main-page {

  section {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .bg {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-image: url(/img/main-bg.png);
  }

}
</style>
