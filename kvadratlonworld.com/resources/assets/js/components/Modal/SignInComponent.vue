<template>
  <div
    class="login"
    v-if="showLogin"
    @click.stop="closeLoginModal"
    data-close="true"
  >
    <div class="login-popup">
      <div
        class="login-popup__btn--close"
        @click.stop="closeLoginModal"
        data-close="true"
      ></div>
      <div class="login-popup__title">{{ vocab.area }}</div>
      <div class="login-popup__download" v-html="vocab.text1"></div>
      <div class="login-popup__join">
        {{ vocab.text2 }}
        <a
          :href="routes.home + '/member'"
          data-close="true"
          @click="closeLoginModal"
          class="login-popup__join--link"
        >
          {{ vocab.link }}
        </a>
      </div>
      <div class="login-popup__title">{{ vocab.login }}</div>
      <form class="form" @submit.prevent="validateContactForm">
        <FormInput
          name="email"
          placeholder="Email"
          reversed
          :error="
            formErrors.email || (errors.has('email') ? formVocab.email : '')
          "
          v-model="formData.email"
          v-validate="'required|email'"
        />

        <FormInput
          name="password"
          type="password"
          reversed
          :placeholder="vocab.password"
          :error="
            formErrors.password ||
            (errors.has('password') ? formVocab.password : '')
          "
          v-model="formData.password"
          v-validate="'required|min:6'"
        />

        <FormCheckbox
          name="remember"
          v-model="formData.agree"
          :text="vocab.remember"
        />

        <!-- <div class="radio-box"> -->
        <!-- <label> -->
        <!-- <input type="checkbox" v-model="formData.remember" /> -->
        <!-- <span></span> -->
        <!-- {{ vocab.remember }} -->
        <!-- </label> -->
        <!-- </div> -->
        <button class="btn-base" :class="{ 'btn-base--loading': isSending }">
          {{ vocab.login }}
        </button>
      </form>
    </div>
  </div>
</template>

<script>
import vocab from "../../translates/login";
import formVocab from "../../translates/form";
import FormInput from "../FormInput";
import FormCheckbox from "../FormCheckbox";

export default {
  name: "SignInComponent",
  components: { FormInput, FormCheckbox },
  props: ["showLogin", "routes", "locale"],
  data() {
    return {
      isSending: false,
      formData: {
        email: "",
        password: "",
        remember: false,
      },
      vocab: vocab[this.locale],
      formVocab: formVocab[this.locale],
      formErrors: {
        email: "",
        password: "",
      },
    };
  },
  mounted() {
    setTimeout(() => {
      console.log(this.veeFields);
    }, 2000);
  },
  methods: {
    validateContactForm() {
      this.$validator.validateAll().then((result) => {
        if (result) {
          console.log(
            "%c Form Submitted!",
            "color: green; font-weight: 600;",
            this.message
          );
          this.loginHandler();
          return;
        }

        console.log("%c Correct them errors!", "color: red; font-weight: 600;");
      });
    },
    closeLoginModal(e) {
      if (e.target.hasAttribute("data-close")) {
        this.$emit("closeLoginModal", this.showLogin);
      }
    },
    loginHandler() {
      this.isSending = true;

      axios({
        method: "post",
        url: this.routes.login,
        data: this.formData,
      })
        .then((res) => {
          console.log(res);
          location.href = res.data.redirect;
          this.isSending = false;
        })
        .catch((err) => {
          this.isSending = false;
          console.log(err);
          if (err.response.status == 422) {
            let responseErrors = err.response.data.errors;

            ["email", "password"].forEach((k) => {
              if (responseErrors[k]) {
                this.formErrors[k] = responseErrors[k][0];
              } else {
                this.formErrors[k] = "";
              }
            });
          }
        });
    },
  },
};
</script>

<style scoped>
</style>
