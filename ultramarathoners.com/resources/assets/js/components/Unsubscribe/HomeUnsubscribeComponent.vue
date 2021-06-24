<template>
    <div>
        <section id="get-in-touch">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form">
                            <form @submit.prevent="validateContactForm">
                                <div class="form__title">{{ this.vocab[this.locale].formTitle }}</div>
                                <div class="form__row">
                                    <label class="form__label" for="first_name">
                                        {{ this.vocab[this.locale].firstName }}
                                        <span class="msg-required">{{ errors.first('First Name') }}</span>
                                    </label>
                                    <input
                                            v-validate="'required'"
                                            :class="{'inp-required': errors.has('First Name')}"
                                            v-model="message.firstName"
                                            name="First Name"
                                            class="form__inp"
                                            id="first_name">
                                </div>
                                <div class="form__row">
                                    <label class="form__label" for="last_name">
                                        {{ this.vocab[this.locale].lastName }}
                                        <span class="msg-required">{{ errors.first('Last Name') }}</span>
                                    </label>
                                    <input
                                            v-validate="'required'"
                                            :class="{'inp-required': errors.has('Last Name') }"
                                            v-model="message.lastName"
                                            name="Last Name"
                                            class="form__inp"
                                            id="last_name">
                                </div>
                                <div class="form__row">
                                    <label class="form__label" for="email">
                                        {{ this.vocab[this.locale].email }}
                                        <span class="msg-required">{{ errors.first('E-mail') }}</span>
                                    </label>
                                    <input
                                            v-validate="'required|email'"
                                            :class="{'inp-required': errors.has('E-mail') }"
                                            v-model="message.email"
                                            name="E-mail"
                                            class="form__inp"
                                            id="email">
                                </div>
                                <div class="form__row">
                                    <label class="form__label" for="message">
                                        {{ this.vocab[this.locale].message }}
                                    </label>
                                    <textarea
                                            v-model="message.message"
                                            name="Message"
                                            class="form__textarea"
                                            id="message"></textarea>
                                </div>

                                <button class="form__btn">{{ this.vocab[this.locale].formBtnSend }}</button>

                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cancel-sub">
                            <div class="cancel-sub__title">
                                <div class="title__row title__red">{{ this.vocab[this.locale].cancelTitle1 }}</div>
                                <div class="title__row">{{ this.vocab[this.locale].cancelTitle2 }}</div>
                                <div class="title_row">{{ this.vocab[this.locale].cancelTitle3 }}</div>
                            </div>
                            <p class="cancel-sub__p">{{ this.vocab[this.locale].cancelPar1 }}</p>
                            <p class="cancel-sub__p">{{ this.vocab[this.locale].cancelPar2 }}</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="desc__block">{{ this.vocab[this.locale].cancelDesc1 }}</div>
                                    <div class="desc__block">{{ this.vocab[this.locale].cancelDesc2 }}</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="desc__block">{{ this.vocab[this.locale].cancelDesc3 }}</div>
                                    <div class="desc__block">{{ this.vocab[this.locale].cancelDesc4 }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="question-section">
            <div class="container">
                <div class="row">
                    <div class="offset-sm-3 col-sm-6 offset-md-0 col-md-4">
                        <img class="question-section__img" src="/img/call.png" alt="">
                    </div>
                    <div class="offset-md-1 col-md-7">
                        <h4>{{ this.vocab[this.locale].faqTitle1 }}</h4>
                        <p>{{ this.vocab[this.locale].faqPar1 }}</p>
                        <h4>{{ this.vocab[this.locale].faqTitle2 }}</h4>
                        <p>{{ this.vocab[this.locale].faqPar2 }}</p>
                    </div>
                </div>

                <div class="h2__title faq__title">{{ this.vocabFaq[this.locale].faq }}</div>
                <div class="question-block"><!-- 1 -->
                    <div class="question-block__title" @click="openInfo">{{ this.vocabFaq[this.locale].questTitle1 }}</div>
                    <div class="question-block__answer active">{{ this.vocabFaq[this.locale].questDesc1 }}</div>
                </div>
                <div class="question-block"><!-- 2 -->
                    <div class="question-block__title" @click="openInfo">{{ this.vocabFaq[this.locale].questTitle2 }}</div>
                    <div class="question-block__answer">{{ this.vocabFaq[this.locale].questDesc2 }}</div>
                </div>
                <div class="question-block"><!-- 3 -->
                    <div class="question-block__title" @click="openInfo">{{ this.vocabFaq[this.locale].questTitle3 }}</div>
                    <div class="question-block__answer">{{ this.vocabFaq[this.locale].questDesc3 }}</div>
                </div>
                <div class="question-block"><!-- 4 -->
                    <div class="question-block__title" @click="openInfo">{{ this.vocabFaq[this.locale].questTitle4 }}</div>
                    <div class="question-block__answer">{{ this.vocabFaq[this.locale].questDesc4 }}</div>
                </div>
                <div class="question-block"><!-- 5 -->
                    <div class="question-block__title" @click="openInfo">{{ this.vocabFaq[this.locale].questTitle5 }}</div>
                    <div class="question-block__answer">{{ this.vocabFaq[this.locale].questDesc5 }}</div>
                </div>
                <div class="question-block"><!-- 6 -->
                    <div class="question-block__title" @click="openInfo">{{ this.vocabFaq[this.locale].questTitle6 }}</div>
                    <div class="question-block__answer">{{ this.vocabFaq[this.locale].questDesc6 }}</div>
                </div>
                <div class="question-block"><!-- 7 -->
                    <div class="question-block__title" @click="openInfo">{{ this.vocabFaq[this.locale].questTitle7 }}</div>
                    <div class="question-block__answer">{{ this.vocabFaq[this.locale].questDesc7 }}</div>
                </div>
                <div class="question-block"><!-- 8 -->
                    <div class="question-block__title" @click="openInfo">{{ this.vocabFaq[this.locale].questTitle8 }}</div>
                    <div class="question-block__answer">{{ this.vocabFaq[this.locale].questDesc8 }}</div>
                </div>
                <div class="question-block"><!-- 9 -->
                    <div class="question-block__title" @click="openInfo">{{ this.vocabFaq[this.locale].questTitle9 }}</div>
                    <div class="question-block__answer">{{ this.vocabFaq[this.locale].questDesc9 }}</div>
                </div>
                <div class="question-block"><!-- 10 -->
                    <div class="question-block__title" @click="openInfo">{{ this.vocabFaq[this.locale].questTitle10 }}</div>
                    <div class="question-block__answer">{{ this.vocabFaq[this.locale].questDesc10 }}</div>
                </div>
                <div class="question-block"><!-- 11 -->
                    <div class="question-block__title" @click="openInfo">{{ this.vocabFaq[this.locale].questTitle11 }}</div>
                    <div class="question-block__answer">{{ this.vocabFaq[this.locale].questDesc11 }}</div>
                </div>
                <div class="question-block"><!-- 12 -->
                    <div class="question-block__title" @click="openInfo">{{ this.vocabFaq[this.locale].questTitle12 }}</div>
                    <div class="question-block__answer">{{ this.vocabFaq[this.locale].questDesc12 }}</div>
                </div>
                <div class="question-block"><!-- 13 -->
                    <div class="question-block__title" @click="openInfo">{{ this.vocabFaq[this.locale].questTitle13 }}</div>
                    <div class="question-block__answer">{{ this.vocabFaq[this.locale].questDesc13 }}</div>
                </div>
                <div class="question-block"><!-- 14 -->
                    <div class="question-block__title" @click="openInfo">{{ this.vocabFaq[this.locale].questTitle14 }}</div>
                    <div class="question-block__answer">{{ this.vocabFaq[this.locale].questDesc14 }}</div>
                </div>
                <div class="question-block"><!-- 15 -->
                    <div class="question-block__title" @click="openInfo">{{ this.vocabFaq[this.locale].questTitle15 }}</div>
                    <div class="question-block__answer">{{ this.vocabFaq[this.locale].questDesc15 }}</div>
                </div>

                <div class="h2__title">
                    {{ this.vocab[this.locale].weAreTitle }}
                    <div class="subtitle">{{ this.vocab[this.locale].weAreSubtitle }}</div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="desc__block">{{ this.vocab[this.locale].weAreDesc1 }}</div>
                        <div class="desc__block">{{ this.vocab[this.locale].weAreDesc2 }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="desc__block">{{ this.vocab[this.locale].weAreDesc3 }}</div>
                        <div class="desc__block">{{ this.vocab[this.locale].weAreDesc4 }}</div>
                    </div>

                </div>

            </div>
        </section>
    </div>
</template>

<script>

    import vocab from '../../translates/unsubscribe/home_unsubscribe';
    import vocabFaq from '../../translates/unsubscribe/faq_qustions';

    export default {
        name: "HomeUnsubscribeComponent",
        props: {
            locale: {
                type: String,
                require: true
            }
        },
        data() {
            return {
                menuIcon: false,
                message: {
                    firstName: '',
                    lastName: '',
                    email: '',
                    message: ''
                },
                vocab: {},
                vocabFaq: {}
            }
        },
        created() {
            this.vocab = vocab;
            this.vocabFaq = vocabFaq;
        },
        methods: {
            openInfo(e) {
                let $this = e.target;
                $($this).parent().find('.question-block__answer').slideToggle(200);
            },
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