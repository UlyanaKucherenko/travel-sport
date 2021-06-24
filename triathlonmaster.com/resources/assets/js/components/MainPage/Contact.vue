<template>
  <section class="contact" id="contact">
<!--    <div class="anchor" id="contact"/>-->
    <div class="container">
      <div class="row">
        <div class="contact__container offset-lg-2 col-lg-8">
          <div class="contact__title section-title">
            {{ vocab.infoTitle }}
          </div>

          <div class="contact__desc">
            {{ vocab.infoDesc }}
          </div>

          <div class="contact-support">
            <img
              class="contact-support__icon"
              src="/img/contact-icon-mail.svg"
              alt=""
            />
            {{ vocab.proposalMail }}
          </div>

          <form class="contact-form col-lg-10" @submit.prevent="validateContactForm">
            <FormInput
              class="contact-form__field"
              name="firstName"
              :title="vocab.firstName + '*'"
              :placeholder="vocab.firstName + '*'"
              :error="errors.has('firstName')"
              v-model="formData.firstName"
              v-validate="'required'"
            />

            <FormInput
              class="contact-form__field"
              name="lastName"
              :title="vocab.lastName + '*'"
              :placeholder="vocab.lastName + '*'"
              :error="errors.has('lastName')"
              v-model="formData.lastName"
              v-validate="'required'"
            />

            <FormInput
              class="contact-form__field"
              name="phone"
              :title="vocab.phone + '*'"
              :placeholder="vocab.phone + '*'"
              :error="errors.has('phone')"
              mask="+### (##) ### ## ##"
              v-model="formData.phone"
              v-validate="'required|min:12'"
            />

            <FormInput
              class="contact-form__field"
              name="email"
              :title="vocab.email + '*'"
              :placeholder="vocab.email + '*'"
              :error="errors.has('email')"
              v-model="formData.email"
              v-validate="'required|email'"
            />

            <FormInput
              class="contact-form__field"
              name="message"
              :title="vocab.message + '*'"
              :placeholder="vocab.message + '*'"
              :error="errors.has('message')"
              v-model="formData.message"
              v-validate="'required|min:3'"
            />

            <button
              class="contact-form__btn btn-base btn-base--reversed"
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

          <CancelForm
            class="contact__cancel-form"
            :locale="locale"
            :translates="vocab.cancel"
          />
        </div>
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
import CancelForm from '../CancelForm'
import VueRecaptcha from 'vue-recaptcha';


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
    CancelForm,
    VueRecaptcha
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
      this.formData.host = 'triathlonmaster.com';
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
  position: relative;
  padding: var(--section-offset) 0;

  &__container {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
  }

  &__title {
    margin-bottom: calc(var(--space-unit) * 2);
    text-align: center;
  }

  &__desc {
    font-weight: 500;
    font-size: calc(var(--space-unit) * 2.3);
    line-height: 180%;
    text-align: center;
    margin-bottom: calc(var(--space-unit) * 3);
    font-style: normal;
  }

  &-support {
    display: flex;
    align-items: center;
    margin-bottom: calc(var(--space-unit) * 3);

    &__icon {
      width: 20px;
      margin-right: 10px;
    }
  }

  &-form {
    margin-bottom: calc(var(--space-unit) * 4);
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;

    &__captcha {
      opacity: 0;
      pointer-events: none;
    }

    &__field {
      width: 100%;
      &:last-of-type {
        margin-bottom: 30px;
      }
    }
  }
}
</style>
