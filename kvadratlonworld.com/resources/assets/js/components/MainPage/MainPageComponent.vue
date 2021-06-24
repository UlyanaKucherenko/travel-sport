<template>
  <div class="main-page">
    <hero :locale="locale"></hero>
    <about :locale="locale"></about>
    <tips :locale="locale"></tips>
    <plans :plans="plans" :locale="locale"></plans>
<!--    <participate :locale="locale"></participate>-->
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
Vue.component("about", require("./About").default);
Vue.component("tips", require("./Tips").default);
Vue.component("services", require("./Services").default);
Vue.component("ebooks", require("./Ebooks").default);
Vue.component("participate", require("./Participate").default);
Vue.component("reviews", require("./Reviews").default);
Vue.component("plans", require("./Plans").default);
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

:root {
  --header-height: 80px;
  --space-unit: 10px;


  @media (max-width: 1200px) {
    --space-unit: 8px;
  }

  @media (max-width: 767px) {
    --space-unit:  6px;
  }

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

}
</style>
