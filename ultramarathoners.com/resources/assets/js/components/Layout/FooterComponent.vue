<template>
  <footer class="footer">
    <div class="container">
      <div class="footer__row row">
        <div class="footer__col">
          <div class="logo footer__logo">
            <img src="/img/logo.svg" alt="">
          </div>
          <p class="footer__text">© {{ new Date().getFullYear() }} {{ this.vocab[this.locale].copy }}</p>
        </div>
        <div class="footer__col flex in-column">
          <a href="/privacy_policy" class="footer__link">{{ this.vocab[this.locale].privacy }}</a>
          <a href="/terms_conditions" class="footer__link">{{ this.vocab[this.locale].terms }}</a>
          <a href="/refund_policy" class="footer__link">{{ this.vocab[this.locale].refund }}</a>
        </div>
        <div class="footer__col footer__text flex in-column">
          KA SOLUTION SZOO<br>
          JAKTOROWSKA st.  40,  ŻYRARDÓW, POLAND.<br>
          # 388357394
        </div>
        <div class="footer__col footer__text flex in-column">
          <div class="mb-2">
            {{ this.vocab[this.locale].phone }}<br>
            +48 71 881 00 24<br>
            Call center Works from 10 AM till 5 PM
          </div>
          <div>
            Email:<br>
            support@ultramarathoners.com
          </div>
        </div>
        <div class="footer__col footer__cards flex center-y">
          <img src="/img/svg/mastercard.svg" alt="Mastercard" class="soc-icon">
          <img src="/img/svg/visa.svg" alt="Visa" class="soc-icon">
          <img src="/img/svg/maestro.svg" alt="Maestro" class="soc-icon">
        </div>
      </div>
    </div>
  </footer>
</template>

<script>

import vocab from '../../translates/footer'

export default {
  name: "FooterComponent",
  props: {
    locale: {
      type: String,
      require: true
    }
  },
  data() {
    return {
      vocab: {}
    }
  },
  created() {
    this.vocab = vocab;
  }
}
</script>

<style lang="scss">
.footer {
  position: relative;
  z-index: 1;
  padding: 10px;
  //border-top: 1px solid rgba(0,0,0,.1);
  background: var(--color-footer-bg);
  min-height: 100px;

  &__row {
    color: white;
    justify-content: space-around;
    @media (max-width: 768px) {
      flex-direction: column;
    }
  }

  &__col {
    @media (max-width: 992px) {
      margin-bottom: 15px;
      text-align: center;
      justify-content: center;
    }
  }

  &__logo {
    justify-content: flex-start;
    margin-bottom: 10px;

    @media (max-width: 992px) {
      justify-content: center;
    }

    img {
      height: 30px;
    }
  }

  &__text {
    font-size: 13px;
  }

  &__link {
    color: inherit;
    font-size: 13px;
    text-decoration: none;
    transition: .3s ease-in-out;

    &:hover {
      color: var(--color-accent-hover);
    }
  }

  &__contacts {
    width: 100%;
    max-width: 190px;
    min-height: 70px;
  }

  &__address {
    width: 75%;
    @media (max-width: 768px) {
      width: 100%;
    }
  }

  &__cards {
    & img {
      width: 45px;
      margin-left: 10px;
    }
  }
}
</style>
