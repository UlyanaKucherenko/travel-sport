<template>

    <div class="booking-contact">
        <form action="" @submit.prevent="sendOrder">

            <div class="booking-contact__title">Личные данные</div>
            <div class="booking-contact__row">
                <input class="booking-contact__inp"
                       placeholder="Имя и Фамилия"
                       v-validate="'required|min:3'"
                       v-model="fullName"
                       name="fullName"
                >
                <span class="text-danger">{{ errors.first('fullName') }}</span>
            </div>
            <div class="booking-contact__row">
                <input class="booking-contact__inp"
                       placeholder="E-mail"
                       v-validate="'required|email'"
                       v-model="email"
                       name="email"
                >
                <span class="text-danger">{{ errors.first('email') }}</span>
            </div>
            <div class="booking-contact__row">
                <input class="booking-contact__inp"
                       placeholder="Телефон"
                       v-validate="'required|min:10'"
                       v-model="phone"
                       name="phone"
                >
                <span class="text-danger">{{ errors.first('phone') }}</span>
            </div>
            <div class="booking-contact__row">
                <textarea class="booking-contact__txt"
                          placeholder="Примечание"
                          v-model="note"
                          name="note"
                ></textarea>
            </div>
            <div class="booking-contact__row">
                <button class="booking-contact__btn" :disabled="!isReadyToOrder">Подтвердить</button>
                <button type="button" class="booking-contact__btn" @click="disableOrder">Отменить</button>
            </div>
        </form>
        <div class="booking-contact__row" v-html="liqpayForm"></div>
    </div>

</template>

<script>

    import {Validator} from 'vee-validate';

    const dict = {
        custom: {
            fullName: {
                required: 'Это поле является обязательным',
                min: 'Слишком короткое имя',
            },
            email: {
                required: 'Это поле является обязательным',
                email: 'Проверьте правильность Вашего Email',
            },
            phone: {
                required: 'Это поле является обязательным',
                min: 'Проверьте правильность ввода',
            },
        }
    };
    Validator.localize('en', dict);

    import {mapState, mapMutations} from 'vuex';

    export default {
        name: "OrderData",
        data() {
            return {
                fullName: '',
                email: '',
                phone: '',
                note: '',
                liqpayForm: '',
            }
        },
        mounted() {
            if (!_.isEmpty(this.user)) {
                this.fullName = this.user.name;
                this.email = this.user.email;
                this.phone = this.user.phone;
            }
        },
        computed: {
            isReadyToOrder() {
                return this.ordersItems.length > 0;
            },
            ...mapState([
                'routes', 'ordersItems', 'user'
            ])
        },
        methods: {
            sendOrder() {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        this.axios.post(
                            this.routes.bookingOrder,
                            {
                                data: {
                                    fullName: this.fullName,
                                    email: this.email,
                                    phone: this.phone,
                                    note: this.note,
                                },
                                items: this.ordersItems,
                            }
                        )
                            .then(res => {
                                const {status, items} = res.data;
                                if (status === 'ok') {
                                    console.log(res);
                                    this.liqpayForm = res.data.liqpayForm;
                                } else {
                                    this.setErrorItems(items)
                                }
                            })
                            .catch(err => {
                                console.log('error', err.response);
                            });
                    }
                });

            },
            disableOrder() {
                console.log('disableOrder')
            },
            ...mapMutations([
                'setErrorItems'
            ])
        }
    }
</script>

<style scoped>
    #section-booking .booking .booking-contact__btn:disabled {
        color: #ccc;
        border-color: #ccc;
    }
</style>