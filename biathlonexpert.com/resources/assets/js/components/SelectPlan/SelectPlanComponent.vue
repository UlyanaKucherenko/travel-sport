<template>
  <div>
    <section id="select-plan">
      <div class="wrappers">
        <div class="container">
          <div class="row">
            <show-plan-component
              :currentPlan="currentPlan"
              :plans="plans"
              @changeCurrentPlan="changeCurrentPlan"
            ></show-plan-component>

            <div class="col-lg-6 col-md-7">
              <form
                class="plan-form"
                method="post"
                @submit.prevent="validateBeforeSubmit"
              >
                <FormInput
                  name="firstName"
                  :placeholder="vocab.firstName"
                  :error="errors.has('firstName')"
                  v-model="formData.first_name"
                  v-validate="'required|alpha'"
                  reversed
                />

                <FormInput
                  name="lastName"
                  :placeholder="vocab.lastName"
                  :error="errors.has('lastName')"
                  v-model="formData.last_name"
                  v-validate="'required|alpha'"
                  reversed
                />

                <FormInput
                  name="address"
                  :placeholder="vocab.address"
                  :error="errors.has('address')"
                  v-model="formData.address"
                  v-validate="'required|min:3'"
                  reversed
                />

                <FormInput
                  name="postalCode"
                  :placeholder="vocab.postalCode"
                  :error="errors.has('postalCode')"
                  v-model="formData.postal_code"
                  v-validate="'required|max:6'"
                  reversed
                />

                <FormInput
                  name="city"
                  :placeholder="vocab.city"
                  :error="errors.has('city')"
                  v-model="formData.city"
                  v-validate="'required|min:3'"
                  reversed
                />

                <FormInput
                  name="country"
                  :placeholder="vocab.country"
                  :error="errors.has('country')"
                  v-model="formData.country"
                  v-validate="'required|min:3'"
                  reversed
                />

                <FormInput
                  name="phone"
                  :placeholder="vocab.phone"
                  :error="errors.has('phone')"
                  v-model="formData.phone"
                  v-validate="'required|min:12'"
									:mask="'+### (##) ### ## ##'"
                  reversed
                />

                <FormInput
                  name="email"
                  :placeholder="vocab.email"
                  :error="errors.has('email')"
                  v-model="formData.email"
                  v-validate="'required|email'"
                  reversed
                />

                <FormInput
                  name="password"
                  :placeholder="vocab.password"
                  :error="errors.has('password')"
                  v-model="formData.password"
                  v-validate="'required|min:6'"
                  type="password"
                  reversed
                />

								<FormCheckbox
                  v-validate="'required:true'"
                  name="agree"
									v-model="agree"
                  :error="errors.has('agree')"
									:text="vocab.agree"
								/>

                <div class="plan-form__btn-block">
                  <button
                    type="submit"
                    class="btn-base"
                  >
                    {{ vocab.send }}
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <transition name="modal-error">
      <div class="modal-error" v-if="modalError">
        <div class="modal-error__text">{{ modalErrorText }}</div>
      </div>
    </transition>

    <section
      id="cart-modal-iframe"
      :class="{ 'cart-modal-iframe': showSelectPlanIframe }"
    ></section>
  </div>
</template>

<script>
import _ from "lodash";
import vocab from "../../translates/select_plan_section";
import FormInput from '../FormInput'
import FormCheckbox from '../FormCheckbox'

Vue.component("show-plan-component", require("./ShowPlanComponent").default);

export default {
	name: "SelectPlanComponent",
	components: {FormInput, FormCheckbox},
  props: {
    plans: {
      type: Array,
      require: true,
    },
    routes: {
      type: Object,
      require: true,
    },
    api_url: {
      type: String,
      require: true,
    },
    locale: {
      type: String,
      require: true,
    },
  },
  data() {
    return {
      vocab: vocab[this.locale],
      currentPlan: {
        id: "",
        price: "",
        title: "",
        text1: "",
        text2: "",
			},
			formData: {
				first_name: '',
				last_name: '',
				address: '',
				postal_code: '',
				city: '',
				country: '',
				phone: '',
        email: '',
        password: ''
			},
      prices: [],
      agree: false,
      modalError: false,
      modalErrorText: "",
      showSelectPlanIframe: false,
    };
  },
  created() {
    this.currentPlan = this.setInitPlan();

    this.prices = this.plans.map((el) => el.price);
    window.addEventListener("message", this.detectIframeEvent, false);
  },
  destroyed() {
    window.removeEventListener("message", this.detectIframeEvent);
  },
  methods: {
    async detectIframeEvent(e) {
      if ("origin" in e && "data" in e && e.origin === this.api_url) {
        const { status, action } = e.data;

        switch (true) {
          case status === "ok" && action === "close":
            this.closeIframeHandel();
            break;
          case status === "ok" && action === "payment_success":
            this.closeIframeHandel();
            //console.log('e=',e.data);
            const makePayment = await axios({
              method: "post",
              data: { order_id: e.data.order_id },
              url: this.routes.set_confirm,
            }).then((res) => res.data);
            if (makePayment.status === "updated") {
              console.log(makePayment);
              const makeWelcomeEmai = await axios.post(
                this.routes.sendWelcomeEmail
              );
              console.log(makeWelcomeEmai.data);
              location.href = this.routes.home;
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
      const currentPlan = _.find(this.plans, (el) => el.currentPlan)
        ? _.find(this.plans, (el) => el.currentPlan)
        : this.plans[0];
      this.currentPlan = currentPlan;
      return {
        id: currentPlan.id,
        price: currentPlan.price,
        title: currentPlan.plan_text[0].title,
        text1: currentPlan.plan_text[0].text1,
        text2: currentPlan.plan_text[0].text2,
      };
    },
    submitRegistrationHandler() {
      axios({
        method: "post",
        url: this.routes.register,
        data: { ...this.formData, plan_id: this.currentPlan.id },
      })
        .then((res) => {
          console.log("res=" + res);
          // location.href = res.data.redirect
          return res;
        })
        .then((res) => {
          console.log("Next step");
          const { user } = res.data;
          user.home = "https://biathlonexpert.com";
          user.descriptor = "https://lmarkbill.com";
          if (user) {
            this.createdIframe(user);
          }
        })
        .catch((error) => {
          console.log("Err", error.response);

          this.modalErrorText = error.response.data.errors.email[0];
          this.modalError = true;

          setTimeout(() => {
            this.modalError = false;
          }, 3000);
        });
    },
    changeCurrentPlan(plan) {
      this.currentPlan = {
        id: plan.id,
        price: plan.price,
        title: plan.plan_text[0].title,
        text1: plan.plan_text[0].text1,
        text2: plan.plan_text[0].text2,
      };
    },
    validateBeforeSubmit() {
      this.$validator.validateAll().then((result) => {
        if (result) {
          console.log("%c Form Submitted!", "color: green; font-weight: 600;");
          this.submitRegistrationHandler();
          return;
        }

        console.log("%c Correct them errors!", "color: red; font-weight: 600;");
      });
    },
    createdIframe(user = null) {
      this.showSelectPlanIframe = true;

      const cardIframeSection = document.getElementById("cart-modal-iframe");
      const cardIframe = document.createElement("iframe");
      const queryString = user
        ? Object.keys(user)
            .map((key) => key + "=" + user[key])
            .join("&")
        : "";

      cardIframe.setAttribute("src", this.api_url + "/card?" + queryString);

      cardIframeSection.appendChild(cardIframe);
    },
  },
};
</script>

<style scoped>
</style>
