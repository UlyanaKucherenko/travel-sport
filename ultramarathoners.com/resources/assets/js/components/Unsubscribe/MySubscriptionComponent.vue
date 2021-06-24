<template>
    <section id="cancellation">
        <div class="container">
            <h1>{{ this.vocab[this.locale].title }}</h1>
            <div class="cancellation-form">
                <form @submit.prevent="validateContactForm">
                    <div class="cancellation-form__email">{{ this.vocab[this.locale].emailTitle }}</div>
                    <div class="cancellation-form__row">
                        <span class="msg-required">{{ errors.first('Email') }}</span>
                        <input
                                v-validate="'required|email'"
                                :class="{'inp-required': errors.has('Email') }"
                                v-model="message.email"
                                name="Email"
                                class="cancellation-form__inp"
                                placeholder="Email">
                    </div>

                    <div class="cancellation-form__info">{{ this.vocab[this.locale].info }}</div>
                    <div class="cancellation-form__agree">
                        <div class="radio-box">
                            <label>
                                <span class="msg-required">{{ errors.first('unsubscribe') }}</span>
                                <input
                                        v-validate="'required'"
                                        name="unsubscribe"
                                        class="cancellation-form__checkbox"
                                        id="privacy"
                                        type="checkbox">
                                <span></span>
                                {{ this.vocab[this.locale].checking }}
                            </label>
                        </div>
                    </div>
                    <button class="cancellation-form__btn">{{ this.vocab[this.locale].btn }}</button>
                </form>
            </div>
            <div class="details">
                <div class="details__address">
                    <img src="img/home.png" alt="Home">
                    {{ this.vocab[this.locale].address }}
                </div>
            </div>
            <div class="details">
        <span class="details__phone">
            <img src="img/phone.png" alt="Phone">
            ŻYRARDÓW +48 71 881 00 24
        </span>
                <span class="details__email">
            <img src="img/email.png" alt="E-mail">
            support@ultramarathoners.com
        </span>
            </div>
        </div>
    </section>
</template>

<script>

    import vocab from '../../translates/unsubscribe/my_subscritptions';

    export default {
        name: "MySubscriptionComponent",
        props: {
            locale: {
                type: String,
                require: true
            }
        },
        data() {
            return {
                vocab: {},
                menuToggle: false,
                message: {
                    email: ""
                }
            }
        },
        created() {
            this.vocab = vocab;
        },
        methods: {
            submitFormHandler() {
                console.log("submitFormHandler");

                /*axios({
                    method: 'post',
                    url: this.routes.contact,
                    data: this.register
                })
                    .then(res => {
                        console.log(res);
                        this.clearProperty(this.register);
                    })
                    .catch(err => console.log(err));*/
            },
            validateContactForm() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        console.log('%c Form Submitted!', 'color: green; font-weight: 600;', this.message);
                        // this.submitFormHandler();
                        return;
                    }

                    console.log('%c Correct them errors!', 'color: red; font-weight: 600;');
                });
            }
        }
    }
</script>

<style scoped>

</style>
