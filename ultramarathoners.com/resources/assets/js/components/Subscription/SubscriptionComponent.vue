<template>
    <section class="member-manage">
        <div class="container">
            <div class="manage-unsubscribe">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="manage-unsubscribe__img">
                            <svg class="basic" v-if="planName == 'beginner'" width="115" height="98"
                                 viewBox="0 0 115 98"
                                 fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M80.8883 29.7415L57.5 97.1553L115 29.7415H80.8883Z" fill="#FFE182"/>
                                <path d="M23.7931 0L0 29.7414H34.1116L23.7931 0Z" fill="#FFCD73"/>
                                <path d="M80.8882 29.7414H115L91.2067 0L80.8882 29.7414Z" fill="#FFCD73"/>
                                <path d="M80.8885 29.7414L57.5002 0L34.1118 29.7414H80.8885Z" fill="#FFCD73"/>
                                <path d="M57.4999 0H23.793L34.1115 29.7414L57.4999 0Z" fill="#FFAA64"/>
                                <path d="M91.2069 0H57.5L80.8883 29.7414L91.2069 0Z" fill="#FFE182"/>
                                <path d="M34.1118 29.7415L57.5002 97.1553L80.8885 29.7415H34.1118Z" fill="#FFAA64"/>
                                <path d="M0 29.7415L57.5 97.1553L34.1117 29.7415H0Z" fill="#FF8C5A"/>
                            </svg>
                            <svg class="beginner" v-if="planName == 'basic'" width="115" height="97"
                                 viewBox="0 0 115 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M115 26.1921L57.5 97L57.1561 96.5777L0 26.1921L25.4905 0H89.5095L115 26.1921Z"
                                      fill="#00E8F2"/>
                                <path d="M115 26.1921L57.5 97V0H89.5095L115 26.1921Z" fill="#00CEF5"/>
                                <path d="M76.7603 26.1335H38.2397L57.1561 0.467095L57.5 0L76.7603 26.1335Z"
                                      fill="#9CFDFF"/>
                                <path d="M89.5086 0L76.4795 26.1335H115L89.5086 0Z" fill="#00F8FE"/>
                                <path d="M25.4914 0L38.5205 26.1335H0L25.4914 0Z" fill="#9CFDFF"/>
                                <path d="M76.4795 26.1333L57.5 96.9998L57.1561 95.7176L38.5205 26.1333H76.4795Z"
                                      fill="#00F8FE"/>
                                <path d="M76.7603 26.1335H76.4795L57.5 97V0L76.7603 26.1335Z" fill="#9CFDFF"/>
                                <path d="M76.7603 26.1335H57.5V0L76.7603 26.1335Z" fill="#00F8FE"/>
                            </svg>
                            <svg class="pro" v-if="planName == 'pro'" width="115" height="97" viewBox="0 0 115 97"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M57.5 97L0 29.8462H115L57.5 97Z" fill="#CC2E48"/>
                                <path d="M115 29.8461H0L19.8276 0H95.1724L115 29.8461Z" fill="#FC3952"/>
                                <path d="M83.5808 29.8461L95.172 0H19.8271L31.4184 29.8461H83.5808Z" fill="#F76363"/>
                                <path d="M83.2758 29.8461L57.5 0L31.7241 29.8461H83.2758Z" fill="#F49A9A"/>
                                <path d="M31.4189 29.8462L57.5002 97L83.5814 29.8462H31.4189Z" fill="#CB465F"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="manage-unsubscribe__title">{{ this.vocab[this.locale].membership }}</div>
                        <div class="manage-unsubscribe__text"
                             :class="`manage-unsubscribe__title-${planName.toLowerCase()}`">{{planName}}
                        </div>
                        <div class="manage-unsubscribe__title">{{ this.vocab[this.locale].subscription }}</div>
                        <div class="manage-unsubscribe__text">{{data.expired_date}}</div>
                    </div>
                    <div class="col-lg-5">
                        <div class="manage-unsubscribe__title">{{ this.vocab[this.locale].available }}</div>
                        <div class="manage-unsubscribe__text">{{`${availableBooks}/${totalBooks}`}}</div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 manage-unsubscribe__bottom">
                        <span class="manage-unsubscribe__btn" @click="showConfirm">{{ this.vocab[this.locale].unsubscribe }}</span>
                    </div>
                </div>
            </div>

            <div class="row" v-if="currentPlan<2">
                <div class="col-lg-6" v-for="(text, index) in planTexts" v-if="currentPlan<index">
                    <div :class="`manage-plan manage-plan--${index}`">
                        <div class="manage-plan__wrap">
                            <div class="manage-plan__title">{{text.title}}</div>
                            <div class="manage-plan__price">{{plans[index].price}} €</div>
                            <div class="manage-plan__subscribe">{{ forMonth }}</div>
                            <div class="manage-plan__trial">{{text.trial}}</div>
                            <button @click="upgrade(index+1)" class="manage-plan__btn">
                                {{ btnUpgrade }}
                            </button>
                            <div class="manage-plan__books">
                                {{text.text1}}<br>
                                {{text.text2}}<br>
                                {{ forWeek }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <transition name="modal-error">
                <div class="modal-error" v-if="modalError">
                    <div class="modal-error__text">{{ modalErrorText }}</div>
                </div>
            </transition>
            <section id="cart-modal-iframe" :class="{'cart-modal-iframe':showSelectPlanIframe}"></section>

            <popup-success
                    :msgText="popup_text"
                    :popup-type="popup_type"
                    :show-popup="show_popup"
                    @closePopup="closePopup"
            ></popup-success>
            <confirm
                    :unsubscribe_route="routes.unsubscribe"
                    :show-confirm="show_confirm"
                    @closeConfirm="closeConfirm"
            ></confirm>
        </div>
    </section>
</template>

<script>

    import vocab from '../../translates/member_area/manage';
    import confirm from '../Popup/PopupConfirm';

    export default {
        name: "SubscriptionComponent",
        components: {confirm},
        props: {
            totalBooks: {
                type: Number,
                require: true
            },
            availableBooks: {
                type: Number,
                require: true
            },
            data: {
                type: Object,
                require: true
            },
            locale: {
                type: String,
                require: true
            },
            routes: {
                type: Object,
                require: true
            },
            planTexts: {},
            plans: {},
            user: {},
            unsubscribeErrors: {
                type: String
            }
        },
        data() {
            return {
                vocab: {},
                currentPlan: 'Beginner',
                // plans: ['Beginner', 'Basic', 'Pro'],
                showSelectPlan: false,
                modalError: false,
                modalErrorText: '',
                api_url: 'https://mmsafecheckout.com',
                show_popup: false,
                showSelectPlanIframe: false,
                popup_type: 'error',
                popup_text: 'error',
                show_confirm: false,
                upgradingToPLan: 0,
                forWeek: "for a week",
                forMonth: "For month",
                btnUpgrade: "Upgrade",
                descriptor: "https://prospbill.com"

            }
        },
        created() {
            this.vocab = vocab;
            this.currentPlan = this.user.plan_id - 1;
            console.log(this.unsubscribeErrors);
            if (this.unsubscribeErrors.length > 2) {
                this.showPopup(this.unsubscribeErrors, "error");
            }
            window.addEventListener('message', this.detectIframeEvent, false);
        },
        destroyed() {
            window.removeEventListener('message', this.detectIframeEvent);
        },
        computed: {
            planName() {
                return this.plans[this.currentPlan].slug;
            }

        },
        mounted() {
            this.forWeek = this.vocab[this.locale].week;
            this.forMonth = this.vocab[this.locale].month;
            this.btnUpgrade = this.vocab[this.locale].upgrade;
        },
        methods: {
            async detectIframeEvent(e) {
                if ("origin" in e && "data" in e && e.origin === this.api_url) {

                    const {status, action} = e.data;

                    switch (true) {
                        case (status === "ok" && action === "close"):
                            this.closeIframeHandel();
                            break;
                        case (status === "ok" && action === "payment_success"):

                            this.closeIframeHandel();
                            //console.log('e=',e.data);
                            const makePayment = await axios({
                                method: 'post',
                                data: {
                                    order_id: e.data.order_id,
                                    plan_id: this.upgradingToPLan,
                                },
                                url: this.routes.set_confirm,
                            })
                                .then(res => {
                                    console.log(res);
                                    return res.data;
                                });

                            if (makePayment.status === "updated") {
                                console.log(makePayment.user);
                                location.href = this.routes.dashboard;
                            }
                            break;
                    }
                }
            },
            closeIframeHandel() {
                this.showSelectPlanIframe = false;
                const cardIframeSection = document.getElementById("cart-modal-iframe");
                cardIframeSection.innerHTML = "";
            },
            setInitPlan() {
                const currentPlan = _.find(this.plans, (el) => el.currentPlan) ? _.find(this.plans, (el) => el.currentPlan) : this.plans[0];
                this.currentPlan = currentPlan - 1;
                return {
                    id: currentPlan.id,
                    price: currentPlan.price,
                    title: currentPlan.plan_text[0].title,
                    text1: currentPlan.plan_text[0].text1,
                    text2: currentPlan.plan_text[0].text2,
                };
            },
            createdIframe(user = null, toPlan = 2) {
                this.showSelectPlanIframe = true;
                const data = {
                        email: user.email,
                        first_name: user.first_name,
                        last_name: user.last_name,
                        address: user.address,
                        city: user.city,
                        //TODO add real Country!
                        country: 'UnitedStates',//user.country,
                        phone: user.phone,
                        postal_code: user.postal_code,
                        plan_id: toPlan,
                        plan_name: this.plans[toPlan - 1].slug,
                        plan_price: this.plans[toPlan - 1].price,
                        // home: window.location.hostname,
                        home: 'https://ultramarathoners.com',
                        contact_phone: '+48 71 881 00 24',
                        descriptor: "https://prospbill.com"
                    }
                ;
                const cardIframeSection = document.getElementById("cart-modal-iframe");
                const cardIframe = document.createElement("iframe");
                const queryString = data ? Object.keys(data).map(key => key + '=' + data[key]).join('&') : "";

                cardIframe.setAttribute("src", this.api_url + "/card?" + queryString);

                cardIframeSection.appendChild(cardIframe);
            },
            upgrade(toPlan) {

                if (this.user) {
                    this.upgradingToPLan = toPlan;
                    this.createdIframe(this.user, toPlan);
                }


            },
            showPopup(text, type) {
                this.popup_text = text;
                this.popup_type = type;
                this.show_popup = true;
            },
            showConfirm() {
                this.show_confirm = true;
            },
            closePopup() {
                this.show_popup = false;
            },
            closeConfirm() {
                this.show_confirm = false;
            },
        }
    }
</script>

<style>

    .alert {
        position: relative;
        padding: .75rem 2rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: .25rem;
        font-family: RobotoRegular, sans-serif;
        font-weight: 600;
        font-size: 18px;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }
</style>
