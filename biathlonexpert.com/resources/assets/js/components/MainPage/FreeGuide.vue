<template>
  <section class="free-guide" id="free-guide">
    <div class="free-guide__container">
      <div class="free-guide__title section-title col-md-12">
        {{ vocab.title }}
      </div>
      <img
        class="free-guide__img"
        src="/img/FreeGuide-image.png" alt=""
      >
      <div class="free-guide__list">
        <div class="free-guide__item">
          <div class="free-guide__item-title">1. Select a WordPress plan (WordPress.com only)</div>
          <div class="free-guide__item-text">
            With WordPress.org you only have one (free) plan option — but it requires you to buy your
            domain, hosting provider, plugins, themes, and everything else related to your WordPress
            site.
            With WordPress.com, you’ll have to choose between the five plans they offer
          </div>
        </div>
        <div class="free-guide__item">
          <div class="free-guide__item-title">2. Set up your domain name and hosting provider</div>
          <div class="free-guide__item-text mb-2">
            Think about your domain name as your home address — it’s how your visitors are able to
            locate your website on the Internet. Your domain name will look something like this:
            www.example.com. Your hosting provider is important because it impacts your website’s speed, security, and
            reliability. There are hundreds of providers to choose from, which is why we put together a
            list of 22 of the best WordPress hosting providers to help you decide what will work best for
            you.
          </div>
          <div class="free-guide__item-btn">
            <a href="#plans" class="free-guide__btn-subscribe btn-base">Enter the library</a>
          </div>
        </div>
        <div class="free-guide__item">
          <div class="free-guide__item-title">3. 3.Install WordPress</div>
          <div class="free-guide__item-text">
            With WordPress.org you only have one (free) plan option — but it requires you to buy your
            domain, hosting provider, plugins, themes, and everything else related to your WordPress
            site.
            With WordPress.com, you’ll have to choose between the five plans they offer
          </div>
        </div>
        <div class="free-guide__item">
          <div class="free-guide__item-title">4.Install WordPress</div>
          <div class="free-guide__item-text">
            With WordPress.org you only have one (free) plan option — but it requires you to buy your
            domain, hosting provider, plugins, themes, and everything else related to your WordPress
            site.
            With WordPress.com, you’ll have to choose between the five plans they offer
          </div>
        </div>
        <div class="free-guide__item">
          <div class="free-guide__item-title">5.Install WordPress</div>
          <div class="free-guide__item-text">
            With WordPress.org you only have one (free) plan option — but it requires you to buy your
            domain, hosting provider, plugins, themes, and everything else related to your WordPress
            site.
            With WordPress.com, you’ll have to choose between the five plans they offer
          </div>
        </div>
        <div class="free-guide__item">
          <div class="free-guide__item-title">6.Install WordPress</div>
          <div class="free-guide__item-text">
            With WordPress.org you only have one (free) plan option — but it requires you to buy your
            domain, hosting provider, plugins, themes, and everything else related to your WordPress
            site.
            With WordPress.com, you’ll have to choose between the five plans they offer
          </div>
        </div>
        <div class="free-guide__item">
          <div class="free-guide__item-title">7.Install WordPress</div>
          <div class="free-guide__item-text">
            With WordPress.org you only have one (free) plan option — but it requires you to buy your
            domain, hosting provider, plugins, themes, and everything else related to your WordPress
            site.
            With WordPress.com, you’ll have to choose between the five plans they offer
          </div>
        </div>
        <div class="free-guide__item">
          <div class="free-guide__item-title">8.Install WordPress</div>
          <div class="free-guide__item-text">
            With WordPress.org you only have one (free) plan option — but it requires you to buy your
            domain, hosting provider, plugins, themes, and everything else related to your WordPress
            site.
            With WordPress.com, you’ll have to choose between the five plans they offer
          </div>
        </div>
      </div>

    </div>
  </section>
</template>

<script>
import vocab from "../../translates/sections/freeguide";

export default {
  name: "freeguide",
  props: {
    locale: {
      type: String,
      require: true,
    },
  },
  data() {
    return {
      vocab: vocab[this.locale]
    };
  },
};
</script>

<style lang="scss">
.free-guide {
  position: relative;
  //padding: calc(var(--space-unit) * 17) 0 calc(var(--space-unit) * 20);
  margin-bottom: calc(var(--space-unit) * 20);
  //@media (max-width: 991px) {
  //  padding: calc(var(--space-unit) * 10) 0 calc(var(--space-unit) * 10);
  //}

  &__container {
    display: flex;
    flex-direction: column;
    align-items: center
  }

  &__title {
    text-align: left;
    margin-bottom: calc(var(--space-unit) * 3.2);
  }

  &__img {
    width: 100%;
    margin-bottom: calc(var(--space-unit) * 4);

    @media (max-width: 767px) {
      display: none;
    }
  }

  &__list {}

  &__item {
    margin-bottom: calc(var(--space-unit) * 2.4);
    color: #000000;
    line-height: 140%;

    &-title {
      font-size: 24px;
      margin-bottom: calc(var(--space-unit) * 0.8);
    }

    &-text {
      font-size: 16px;
      letter-spacing: 0.005em;
    }

    &-btn {
      width: 100%;
      display: flex;
      justify-content: flex-end;
    }
  }

}
</style>
