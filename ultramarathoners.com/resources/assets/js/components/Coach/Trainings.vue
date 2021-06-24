<template>
    <div @click="hideInputs">
        <section id="section-trainings">
            <div class="container" ref="container">
                <div class="trainings">

                    <!-- Header block-->
                    <div class="row bg-white">
                        <div class="trainings__header">
                            <div class="header__date">
                                <date-picker
                                        class="datepicker"
                                        :value="selectedDate"
                                        :first-day-of-week="1"
                                        :default-value="selectedDate"
                                        :lang="locale"
                                        format="YYYY-MM-DD"
                                        @change="changeSelectedDate"
                                ></date-picker>
                            </div>
                            <div class="date-nav">
                                <div class="date-nav__item">{{ this.vocab[this.locale].past }}</div>
                                <div class="date-nav__item">{{ this.vocab[this.locale].current }}</div>
                                <div class="date-nav__item">{{ this.vocab[this.locale].session }}</div>
                                <div class="date-nav__item">{{ this.vocab[this.locale].signed }}</div>
                            </div>


                        </div>
                    </div>

                    <!-- Time block-->
                    <div class="row bg-white mb-3">
                        <ChangeDateByStep
                        :locale="locale">
                        </ChangeDateByStep>
                        <div class="col-xs-8 col-sm-8 col-md-9 week-block">
                            <div class="week-block__item" v-for="day in workDaysRange">
                                {{ selectedDate | moment("add",`${day} days`,"dd") }}
                            </div>
                        </div>
                    </div>

                    <!-- Price block-->
                    <div class="row ">
                        <div class="col-xs-4 col-sm-4 col-md-3 time-block">
                            <div class="time-block__row" v-for="time in worksTime" :key="time">
                                {{ renderWorksTime(time) }}
                            </div>
                        </div>

                        <div class="col-xs-8 col-sm-8 col-md-9 price-block">
                            <div class="" v-for="(time,i) in worksTime" :key="`${time}_${i}`">
                                <BookingItem
                                        v-for="day in workDaysRange"
                                        :time="time"
                                        :day="day"
                                        :key="`${day}_${time}`"
                                        :routes="routes"
                                        :user="userId"
                                />
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </section>
    </div>
</template>

<script>
    import moment from 'moment';
    import BookingItem from '../Assets/BookingItem';
    import ChangeDateByStep from '../Assets/ChangeDateByStep';
    import OrderItems from '../Assets/OrderItems';
    import SelectLocation from '../Assets/SelectLocation';
    import OrderData from '../Assets/OrderData';
    import {mapState, mapMutations, mapActions} from 'vuex';
    import vocab from '../../translates/member_area/coach';


    import DatePicker from 'vue2-datepicker'

    export default {
        name: "Trainings",
        data() {
            return {
                workDaysRange: 0,
                userId: -1,
                vocab: {}
            }
        },
        components: {
            DatePicker, BookingItem, ChangeDateByStep, OrderItems, SelectLocation, OrderData
        },
        props: {
            routes: {},
            user: {},
            locale:{
                type: String
            },
        },
        computed: {
            formatDay() {
                return moment(this.selectedDate).add({days: this.day}).format("YYYY-MM-DD");
            },
            worksTime() {
                return _.range(10, 24, 2);
            },
            ...mapState([
                'selectedDate', 'rentDataCalendar'
            ])
        },

        methods: {

            hideInputs() {
                EventBus.$emit('hide-input', this._uid);
            },
            renderWorksTime(text) {
                return `${text}.00 - ${text + 2}.00`
            },
            workDaysRangeHandler() {
                if ('container' in this.$refs) {
                    switch (true) {
                        case (this.$refs.container.clientWidth <= 420):
                            return this.workDaysRange = _.range(0, 3);
                        case (this.$refs.container.clientWidth <= 539):
                            return this.workDaysRange = _.range(0, 4);
                        case (this.$refs.container.clientWidth <= 540):
                            return this.workDaysRange = _.range(0, 6);
                        case (this.$refs.container.clientWidth <= 720):
                            return this.workDaysRange = _.range(0, 7);
                        case (this.$refs.container.clientWidth <= 960):
                            return this.workDaysRange = _.range(0, 10);
                        case (this.$refs.container.clientWidth <= 1140):
                            return this.workDaysRange = _.range(0, 12);
                        case (this.$refs.container.clientWidth <= 1300):
                            return this.workDaysRange = _.range(0, 14);
                        default:
                            return this.workDaysRange = _.range(0, 14);
                    }
                }
                return this.workDaysRange = 0;
            },
            ...mapMutations([
                'setRoutes', 'hideLoginForm', 'changeSelectedDate'
            ]),
            ...mapActions([
                'getRentItemsData'
            ])
        },
        created() {
            this.vocab = vocab;
            window.addEventListener('resize', this.workDaysRangeHandler);
            this.userId = JSON.parse(this.user).id;
        },
        mounted() {
            this.setRoutes(this.routes);
            this.workDaysRangeHandler();

            this.getRentItemsData();
        },
        destroyed() {
            window.removeEventListener('resize', this.workDaysRangeHandler);
        },
    }
</script>

<style>

</style>
