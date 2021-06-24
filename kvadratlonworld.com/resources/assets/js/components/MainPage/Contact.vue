<template>
  <section class="contact" id="contact">
<!--    <div class="anchor" id="contact"/>-->
    <div class="container contact__container">
      <div class="contact__content">
        <div class="contact__title section-title">
          {{ vocab.infoTitle }}
        </div>
        <div class="contact__desc">
          {{ vocab.infoDesc }}
        </div>

        <form class="contact-form" @submit.prevent="validateContactForm">
          <FormInput
              name="firstName"
              :title="vocab.firstName + '*'"
              :error="errors.has('firstName')"
              v-model="formData.firstName"
              v-validate="'required'"
          />

          <FormInput
              name="lastName"
              :title="vocab.lastName + '*'"
              :error="errors.has('lastName')"
              v-model="formData.lastName"
              v-validate="'required'"
          />

          <FormInput
              name="phone"
              :title="vocab.phone + '*'"
              :error="errors.has('phone')"
              mask="+### (##) ### ## ##"
              v-model="formData.phone"
              v-validate="'required|min:12'"
          />

          <FormInput
              name="email"
              :title="vocab.email + '*'"
              :error="errors.has('email')"
              v-model="formData.email"
              v-validate="'required|email'"
          />

          <FormInput
              name="message"
              :title="vocab.message + '*'"
              :error="errors.has('message')"
              v-model="formData.message"
              v-validate="'required|min:3'"
          />

          <button
              class="btn-base btn-base--reversed"
              :class="{ 'btn-base--loading': sending }"
              type="submit"
              :disabled="sending"
          >
            {{ vocab.send }}
          </button>

          <vue-recaptcha
              class="contact-form__captcha"
              :loadRecaptchaScript="true"
              ref="invisibleRecaptcha"
              @verify="onVerify"
              @expired="onExpired"
              size="invisible"
              :sitekey="sitekey">
          </vue-recaptcha>
        </form>

        <div class="contact-support">
          <img
              class="contact-support__icon"
              src="/img/contact-icon-mail.svg"
              alt=""
          />
          {{ vocab.proposalMail }}
        </div>

        <CancelForm
            class="contact__cancel-form"
            :locale="locale"
            :translates="vocab.cancel"
        />
      </div>
    </div>

    <Popup
        v-if="showPopup"
        :text="popupMsg"
        @changeShows="showPopup = $event"
    />
  </section>
</template>

<script>
import vocab from "../../translates/sections/contact";
import Popup from "../Popup/Popup";
import FormInput from "../FormInput";
import VueRecaptcha from 'vue-recaptcha';
import CancelForm from "../CancelForm";

export default {
  name: "ContactSectionComponent",
  props: {
    routes: {
      type: Object,
      required: true,
    },
    locale: {
      type: String,
      required: true,
    },
  },
  components: {
    Popup,
    FormInput,
    VueRecaptcha,
    CancelForm
  },
  data() {
    return {
      popupMsg: undefined,
      formValid: false,
      captchaVerified: false,
      sitekey: '6Lf8NRoaAAAAAHdkoq44l6x2ifLaYhh8yznSiBZN',
      vocab: vocab[this.locale],
      showPopup: false,
      sending: false,
      formData: {
        firstName: "",
        lastName: "",
        phone: "",
        email: "",
        message: "",
      },
    };
  },
  watch: {
    captchaVerified() {
      if (this.formValid) {
        this.submitFormHandler()
      }
    }
  },
  methods: {
    validateContactForm() {
      this.$validator.validateAll().then((result) => {
        if (result) {
          this.formValid = true;
          this.$refs.invisibleRecaptcha.execute()
        } else this.formValid = false
      });
    },
    submitFormHandler() {
      console.log("submitFormHandler");
      this.sending = true;
      this.formData.host = 'kvadratlonworld.com';
      axios({
        method: "post",
        url: 'https://msubserv.com/api/mail/',
        data: this.formData,
      })
          .then(res => {
            this.popupMsg = undefined;
            this.showPopup = true;
            this.clearFormData(this.formData);
          })
          .catch(err => {
            this.popupMsg = 'Something went wrong'
            this.showPopup = true
          })
          .finally(() => {
            this.sending = false
            this.$validator.reset()
            this.formValid = false
            this.captchaVerified = false
            this.$refs.invisibleRecaptcha.reset()
          })
    },
    clearFormData(object) {
      for (let property in object) {
        object[property] = "";
      }
    },
    onSubmit: function () {
      this.$refs.invisibleRecaptcha.execute()
    },
    onVerify: function (response) {
      console.log('verified')
      this.captchaVerified = true
      // console.log('Verify: ' + response)
    },
    onExpired: function () {
      // console.log('Expired')
    },
  }
};
</script>

<style lang="scss">
.contact {
  margin-bottom: calc(var(--space-unit) * 18);
  padding-top: calc(var(--space-unit) * 9.4);

  &__container {
    display: flex;
    justify-content: center;
  }

  &__content {
    position: relative;
  }

  &__title {
    margin-bottom: calc(var(--space-unit) * 2);
    text-align: center;
  }

  &__desc {
    text-align: center;
    font-weight: 400;
    font-size: calc(var(--space-unit) * 2.4);
    line-height: 120%;
    max-width: 736px;
    width: 100%;
    margin-bottom: calc(var(--space-unit) * 4);
  }

  &-support {
    text-align: center;
    margin-bottom: calc(var(--space-unit) * 7);

    &__icon {
      width: 20px;
      margin-right: 10px;
    }
  }

  &-form {
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;

    &__captcha {
      opacity: 0;
      pointer-events: none;

    }
  }

  &__cancel-form {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
}
</style>
