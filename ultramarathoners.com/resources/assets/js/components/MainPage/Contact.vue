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
          <form class="contact-form col-lg-10" @submit.prevent="validateContactForm">
            <FormInput
                name="firstName"
                :placeholder="vocab.firstName"
                :error="errors.has('firstName')"
                v-model="formData.firstName"
                v-validate="'required'"
            />

            <FormInput
                name="lastName"
                :placeholder="vocab.lastName"
                :error="errors.has('lastName')"
                v-model="formData.lastName"
                v-validate="'required'"
            />

            <FormInput
                name="phone"
                :placeholder="vocab.phone"
                :error="errors.has('phone')"
                mask="+### (##) ### ## ##"
                v-model="formData.phone"
                v-validate="'required|min:12'"
            />

            <FormInput
                name="email"
                :placeholder="vocab.email"
                :error="errors.has('email')"
                v-model="formData.email"
                v-validate="'required|email'"
            />

            <FormInput
                class="contact-form__textarea"
                name="message"
                :placeholder="vocab.message"
                :error="errors.has('message')"
                v-model="formData.message"
                v-validate="'required|min:3'"
                rows="1"
            />

            <button
                class="contact-form__btn btn-base btn-base--reversed"
                :class="{'btn-base--loading': sending}"
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

          <div class="contact-proposal">
            <div class="contact-proposal__title">
              {{ vocab.proposal }}
            </div>
            <div class="contact-proposal-mail">
              <img
                  class="contact-proposal-mail__img"
                  src="/img/contact-icon-mail1.svg" alt=""
              >
              {{ vocab.mail }}
            </div>
          </div>
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
import vocab from '../../translates/sections/contact';
import Popup from '../Popup/Popup';
import FormInput from '../FormInput'
import VueRecaptcha from 'vue-recaptcha';
import CancelForm from '../CancelForm'

export default {
  name: "ContactSectionComponent",
  props: {
    routes: {
      type: Object,
      required: true
    },
    locale: {
      type: String,
      required: true
    }
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
        firstName: '',
        lastName: '',
        phone: '',
        email: '',
        message: ''
      },
    }
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
      this.formData.host = 'ultramarathoners.com';
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
}
</script>

<style lang="scss">
.contact {
  padding: calc(var(--space-unit) * 9.4) 0 calc(var(--section-offset)*2.9) 0;
  font-family: var(--font-contact);

  .success-block {
    color: black;
  }

  &__container {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  &__desc {
    font-size: 23px;
    line-height: 147%;
    text-align: center;
    margin-bottom: calc(var(--space-unit) * 2.3);
  }

  &-proposal {
    &__title {
      font-size: var(--text-24);
      text-align: center;
      margin-bottom: calc(var(--space-unit) * 2);
    }

    &-mail {
      display: flex;
      align-items: center;
      margin-bottom: calc(var(--space-unit) * 7);

      &__img {
        margin-top: .2em;
        margin-right: 10px;
      }
    }
  }

  &-form {
    width: 100%;
    margin-bottom: calc(var(--space-unit) * 4);
    display: flex;
    flex-direction: column;
    align-items: center;

    //@media (max-width: 991px) {
    //  width: unset;
    //}

    &__captcha {
      opacity: 0;
      pointer-events: none;

    }

    &__popup {
      color: black;
    }

    &__textarea {
      margin-bottom: 0;
    }

    &__btn {
      margin-top: 30px;
      color: var(--color-white);

      @media (max-width: 575px) {
        min-width: 100%;
      }

      &:hover {
        --color-base: var(--color-accent-hover);
      }
    }
  }

  &__cancel-form {
    margin-top: auto;
  }
}
</style>
