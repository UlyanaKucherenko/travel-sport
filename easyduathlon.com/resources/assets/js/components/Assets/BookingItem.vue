<template>
    <div :class="`price-block__item ${status} ${today}` " @click.stop="toggleBooked"></div>
</template>

<script>
    import moment from 'moment';
    import {mapState, mapMutations, mapActions} from 'vuex';

    export default {
        name: "BookingItem",
        props: {
            day: {},
            time: {},
            routes: {},
            user: {},
        },
        data() {
            return {
                cssClass: '',
                status: 'none',

            }
        },
        created() {
            // this.status = this.getStatus;
        },
        watch: {
            rentDataCalendar(newValue, oldValue) {
                this.status = this.getStatus(this.time, this.day);
            },
            selectedDate(newValue, oldValue) {
                this.status = this.getStatus(this.time, this.day);
            },

        },
        computed: {
            today(){
                if(this.formatDay === moment().format('YYYY-MM-DD')){
                    return "today";
                }
                return '';
            },
            formatDay() {
                return moment(this.selectedDate).add({days: this.day}).format("YYYY-MM-DD");
            },

            ...mapState([
                'selectedLocation', 'selectedDate', 'rentDataCalendar', 'ordersItems'
            ])
        },

        methods: {

            getStatus(time, day) {
                let result = '';
                const date = moment(this.selectedDate).add({days: day}).format("YYYY-MM-DD");
                const booked_by = this.rentDataCalendar[time][date];

                if (booked_by === undefined) {
                    return 'no1';
                }

                if (booked_by === this.user  ) {
                    console.log(booked_by);
                    if(moment(date).isSameOrAfter(moment(), 'days')){
                        return 'booked';
                    }
                    return 'past';
                }

                if (booked_by === 0 && moment(date).isSameOrAfter(moment(), 'days')) {
                    return 'avail';
                }


                return 'no2';
            },

            toggleBooked(event) {
                if(this.status === 'booked' || this.status === 'avail') {
                    let newStatus = '';
                    if (this.status === 'booked') {
                        newStatus = 0;
                    } else {
                        newStatus = this.user;
                    }
                    this.axios({
                        url: this.routes.updateBookingItem,
                        method: "post",
                        data: {
                            date: this.formatDay,
                            time: this.time,
                            booked_by: newStatus,
                        },
                    })
                        .then(res => {
                            const date = res.data.result.date;
                            const time = res.data.result.time;
                            const booked_by = res.data.result.booked_by;
                            this.rentDataCalendar[time][date] = booked_by;
                            this.status = this.getStatus(this.time, this.day);
                        })
                        .catch(err => {
                            console.log('error', err);
                        });
                }
            },
        },
    }
</script>


<style>
    .custom_input {
        width: 100%;
        height: 100%;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>