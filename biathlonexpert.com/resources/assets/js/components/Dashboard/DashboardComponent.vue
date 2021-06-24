<template>
  <section class="member-dashboard">
    <MyPlan
      :local="locale"
      :expirationData="expirationData"
      :totalBooks="totalBooks"
      :availableBooks="availableBooks"
      btnName="Upgrade"
    />

    <div class="container">
      <div class="dash-block">
        <div class="dash-block__title">My books</div>
        <RecentBooks
          :recent-books="recentBooks"
        ></RecentBooks>
      </div>
    </div>
  </section>
</template>

<script>

import vocab from '../../translates/member_area/dashboard';
import RecentBooks from '../Assets/RecentBooks'
import MyPlan from "../Assets/MyPlan";

export default {
  name: "DashboardComponent",
  props: {
    totalBooks: {
      type: Number,
      require: true
    },
    availableBooks: {
      type: Number,
      require: true
    },
    previewBooks: {
      type: Array,
      require: true
    },
    expirationData: {
      type: String,
      require: true
    },
    locale: {
      type: String,
      require: true
    },
    recentBooks: {},
    topBook: {},
  },
  components: {MyPlan, RecentBooks},
  data() {
    return {
      vocab: {},
      slider_books: [
        {
          src: '/img/book1.png',
          desc: 'Before You Deliver'
        },
        {
          src: '/img/book2.png',
          desc: 'The Impatient Woman\'s Guide to Getting Pregnant'
        },
        {
          src: '/img/book3.png',
          desc: 'Mom Life: A Snarky Adult Coloring Book'
        },
        {
          src: '/img/book1.png',
          desc: 'Before You Deliver'
        },
        {
          src: '/img/book2.png',
          desc: 'The Impatient Woman\'s Guide to Getting Pregnant'
        },
        {
          src: '/img/book3.png',
          desc: 'Mom Life: A Snarky Adult Coloring Book'
        }
      ],
      btnUpgrade: "Upgrade",
    }
  },
  created() {
    this.vocab = vocab;
  },
  methods: {
    upgrade(toPlan) {
      if (this.user) {
        this.upgradingToPLan = toPlan;
        this.createdIframe(this.user, toPlan);
      }
    },
    next() {
      this.$refs.slick.next();
    },
    prev() {
      this.$refs.slick.prev();
    },
    reInit() {
      this.$nextTick(() => {
        this.$refs.slick.reSlick();
      });
    },
  }
}
</script>

<style lang="scss" scoped>
.imgEbooks img {
  width: 100%;
}

</style>
