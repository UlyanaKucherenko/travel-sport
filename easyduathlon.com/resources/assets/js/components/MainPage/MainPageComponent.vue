<template>
  <div class="main-page">
    <hero :locale="locale"></hero>
    <about :locale="locale"></about>
    <chooseUs :locale="locale"></chooseUs>
    <tips :locale="locale"></tips>
<!--    <home :locale="locale"></home>-->
<!--    <ebooks :locale="locale"></ebooks>-->
<!--    <aboutDuathlon :locale="locale"></aboutDuathlon>-->
<!--    <useful :locale="locale"></useful>-->
    <plans :plans="plans" :locale="locale"></plans>
<!--    <method :locale="locale"></method>-->
<!--    <ourMembers :locale="locale"></ourMembers>-->

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
Vue.component("home", require("./Home").default);
Vue.component("about", require("./About").default);
Vue.component("chooseUs", require("./ChooseUs").default);
Vue.component("ebooks", require("./Ebooks").default);
Vue.component("aboutDuathlon", require("./AboutDuathlon").default);
Vue.component("useful", require("./Useful").default);
Vue.component("plans", require("./Plans").default);
Vue.component("tips", require("./Tips").default);
Vue.component("method", require("./Method").default);
Vue.component("ourMembers", require("./OurMembers").default);
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
