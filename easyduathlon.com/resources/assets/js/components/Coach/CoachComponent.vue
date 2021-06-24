<template>
    <div>
        <section class="member-trainings">
            <div class="container">
                <div class="trainings-block">
                    <div class="date-nav">
                        <div class="date-nav__item">Sign Up</div>
                        <div class="date-nav__item">Current date</div>
                        <div class="date-nav__item">Available Sessions</div>
                        <div class="date-nav__item">Past Sessions</div>
                    </div>
                    <div class="calendar-block">
                        <YearCalendar
                                v-model="year"
                                :activeDates.sync="activeDates"
                                :activeClass="activeClass"
                                prefixClass="calendar-block__day"
                                @toggleDate="toggleDate"
                                lang="en"
                                :showYearSelector="showYearSelector"
                        ></YearCalendar>
                    </div>
                </div>
            </div>
        </section>


        <div class="popup-times" v-if="popupTimes">
            <div class="popup-times__close" @click="popupTimes = false">&times;</div>
            <div class="popup-times__date">{{ popupDate }}</div>
            <div class="popup-times__time">
                <div class="time__item" :class="{active:selectedTime===8}">08:00</div>
                <div class="time__item" :class="{active:selectedTime===10}">10:00</div>
                <div class="time__item" :class="{active:selectedTime===12}">12:00</div>
                <div class="time__item" :class="{active:selectedTime===14}">14:00</div>
                <div class="time__item" :class="{active:selectedTime===16}">16:00</div>
                <div class="time__item" :class="{active:selectedTime===18}">18:00</div>
                <div class="time__item" :class="{active:selectedTime===20}">20:00</div>
                <div class="time__item" :class="{active:selectedTime===22}">22:00</div>
                <div class="time__item" :class="{active:selectedTime===0}">00:00</div>
            </div>
            <button class="popup-times__btn" @click="popupTimes = false">Request</button>
        </div>
    </div>
</template>

<script>

    import YearCalendar from 'vue-material-year-calendar';
    import vocab from '../../translates/coach_session';

    export default {
        name: "CoachComponent",
        props: {
            locale: {
                type: String,
                require: true
            },
            trainings: {},
        },
        components: {YearCalendar},
        data() {
            return {
                register: {
                    firstName: '',
                    secondName: '',
                    email: '',
                    phone: '',
                    day: ''
                },
                showRequestSession: false,
                vocab: {},

                year: 2019,
                activeDates: [
                    {date: '2019-02-14', className: 'green'},
                    {date: '2019-02-17', className: 'blue'},
                    {date: '2019-02-22', className: 'yellow'},
                    {date: '2019-02-25', className: 'red'},
                    {date: '2019-03-1', className: 'green'},
                    {date: '2019-03-6', className: 'blue'},
                    {date: '2019-03-11', className: 'yellow'},
                    {date: '2019-03-12', className: 'red'},
                    {date: '2019-03-19', className: 'red'},
                ],
                activeClass: '',
                showYearSelector: true,
                popupTimes: false,
                popupDate: ''
            }
        },
        created() {
            this.vocab = vocab;
        },
        methods: {
            // validateFormSubmit() {
            //     this.$validator.validateAll().then((result) => {
            //         if (result) {
            //             console.log('%c Form Submitted!', 'color: green; font-weight: 600;');
            //             return;
            //         }
            //
            //         console.log('%c Correct them errors!', 'color: red; font-weight: 600;');
            //     });
            // },
            toggleDate(dateInfo) {
                console.log(dateInfo);  // { date: '2010-10-23', selected: true }
                let date = dateInfo.date;
                this.popupDate = date.split('-').reverse().join('.');
                this.popupTimes = true;
            }
        }
    }
</script>