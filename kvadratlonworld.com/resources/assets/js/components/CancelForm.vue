<template>
  <form
    class="cancel-form"
    @submit.prevent="validateForm"
  >
    <div class="cancel-form__title section-title">
      {{ translates.title }}
    </div>

    <FormInput
      class="cancel-form__field"
      name="email"
      :placeholder="translates.placeholder"
      :error="errors.has('email')"
      v-model="email"
      v-validate="'required|email'"
    />

    <button
      class="btn-base btn-base--reversed"
      type="submit"
    >
      {{ translates.btn }}
    </button>

    <vue-recaptcha
      class="cancel-form__captcha"
      :loadRecaptchaScript="true"
      ref="captcha"
      @verify="handleVerify"
      size="invisible"
      :sitekey="sitekey">
    </vue-recaptcha>

    <Popup
      class="cancel-form__popup"
      v-if="responsePopupIsOpen"
      :text="responseMsg"
      @changeShows="responsePopupIsOpen = false"
    />
  </form>
</template>

<script>
import FormInput from './FormInput'
import VueRecaptcha from 'vue-recaptcha';
import Popup from './Popup/Popup';

export default {
  props: ['locale', 'translates'],
  components: {FormInput, VueRecaptcha, Popup},

  data() {
    return {
      email: '',
      responsePopupIsOpen: false,
      responseMsg: '',
      formValid: false,
      captchaVerified: false,
      sitekey: '6Lf8NRoaAAAAAHdkoq44l6x2ifLaYhh8yznSiBZN',
    }
  },
  watch: {
    captchaVerified() {
      if (this.formValid) {
        this.submitForm()
      }
    }
  },
  methods: {
    validateForm() {
      this.$validator.validateAll().then((result) => {
        if (result) {
          this.formValid = true;
          this.$refs.captcha.execute()
        } else this.formValid = false
      });
    },

    handleVerify(response) {
      console.log('verified')
      this.captchaVerified = true
    },

    submitForm() {
      console.log('submitting')
      axios({
        method: 'post',
        url: 'https://msubserv.com/api/unsubscribe',
        data: {
          email: this.email,
          host: window.location.host
        }
      })
        .then(res => {
          this.responseMsg = 'Your subscription has been canceled'
          this.responsePopupIsOpen = true
        })
        .catch(err => {
          this.responseMsg = 'Something went wrong'
          this.responsePopupIsOpen = true
        })
        .finally(() => {
          this.email = ''
          this.$validator.reset()
          this.formValid = false
          this.captchaVerified = false
          this.$refs.captcha.reset()
        })
    }
  }
}
</script>

<style lang="scss">
.cancel-form {
  &__title {
    text-align: center;
    margin-bottom: calc(var(--space-unit) * 2);
  }

  &__field {
  }

  &__popup {
    color: black;
  }
}
</style>
