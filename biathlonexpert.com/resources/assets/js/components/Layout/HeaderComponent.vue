<template>
  <div class="header-bg" :class="{ 'header-bg--scroll': scrollActive }">
    <div class="header container">
      <a :href="routes.home" class="logo" style="height: 40px">
        <img src="/img/logo.svg" alt="" style="height: 100%"/>
      </a>

      <div class="localization">
        <div class="active" @click="changeLang = !changeLang">
          <img :src="language.img" :alt="language.name" />
        </div>
        <ul class="localization__list" :class="{ open: changeLang }">
          <li v-for="(language, key) in languages" @click="selectLanguage(key)">
            <img :src="language.img" :alt="language.name" />
          </li>
        </ul>
      </div>

      <div
        class="header__btn"
        :class="{ active: showMenu }"
        @click="showMenuToggle"
      >
        <div class="header-btn__line"></div>
        <div class="header-btn__line"></div>
        <div class="header-btn__line"></div>
      </div>

      <nav class="header__nav">
        <ul class="header-nav__list">
          <li>
            <a
              :href="createRouteLink('#hero')"
              class="header-nav-list__link"
              @click="showMenuToggle"
              >{{ this.vocab[this.locale].home }}</a
            >
          </li>
          <li>
            <a
              :href="createRouteLink('#about')"
              class="header-nav-list__link"
              @click="showMenuToggle"
            >{{ this.vocab[this.locale].about }}</a
            >
          </li>
<!--          <li>-->
<!--            <a-->
<!--              :href="createRouteLink('#wedo')"-->
<!--              class="header-nav-list__link"-->
<!--              @click="showMenuToggle"-->
<!--            >{{ this.vocab[this.locale].wedo }}</a-->
<!--            >-->
<!--          </li>-->
<!--          <li>-->
<!--            <a-->
<!--              :href="createRouteLink('#ebooks')"-->
<!--              class="header-nav-list__link"-->
<!--              @click="showMenuToggle"-->
<!--            >{{ this.vocab[this.locale].ebooks }}</a-->
<!--            >-->
<!--          </li>-->
          <li>
            <a
              :href="createRouteLink('#plans')"
              class="header-nav-list__link"
              @click="showMenuToggle"
              >{{ this.vocab[this.locale].plans }}</a
            >
          </li>
          <li v-if="is_login">
            <a :href="routes.dashboard" class="header-nav-list__link">{{
              this.vocab[this.locale].member
            }}</a>
          </li>
          <li>
            <a
              :href="createRouteLink('#contact')"
              class="header-nav-list__link"
              @click="showMenuToggle"
              >{{ this.vocab[this.locale].contact }}</a
            >
          </li>
          <li v-if="!is_login">
            <a
              href="#"
              class="header-nav-list__mobile-btn btn-base btn-base--sm btn-base--fit-width"
              @click="showLoginHandler"
            >{{ this.vocab[this.locale].login }}
            </a>
          </li>
          <li v-else>
            <a
              :href="routes.logout"
              class="header-nav-list__mobile-btn btn-base btn-base--sm btn-base--fit-width"
            >{{ this.vocab[this.locale].logout }}
            </a>
          </li>
        </ul>
      </nav>

      <ul class="header-nav__actions">
        <li v-if="!is_login">
          <a
            href="#"
            class="btn-base btn-base--sm btn-base--fit-width"
            @click="showLoginHandler"
          >{{ this.vocab[this.locale].login }}
          </a>
        </li>
        <li v-else>
          <a
            :href="routes.logout"
            class="btn-base btn-base--sm btn-base--fit-width"
          >{{ this.vocab[this.locale].logout }}
          </a>
        </li>
      </ul>
    </div>

    <sign_in-modal
      :showLogin="showLogin"
      :routes="routes"
      @closeLoginModal="closeLoginModal"
      :locale="locale"
    ></sign_in-modal>
  </div>
</template>

<script>
Vue.component("sign_in-modal", require("../Modal/SignInComponent").default);
import vocab from "../../translates/header.js";

const languages = [
  {
    name: "EN",
    img: "/img/language/england.png",
    slag: "en",
  },
  {
    name: "FR",
    img: "/img/language/france.png",
    slag: "fr",
  },
  {
    name: "IT",
    img: "/img/language/italy.png",
    slag: "it",
  },
];

export default {
  name: "HeaderComponent",
  props: {
    is_login: {
      type: Boolean,
      require: true,
    },
    routes: {
      type: Object,
      require: true,
    },
    locale: {
      type: String,
      require: true,
    },
  },
  data() {
    return {
      scrollActive: false,
      showMenu: false,
      showLogin: false,
      languages: languages,
      language: languages[0],
      changeLang: false,
      vocab: {},
    };
  },
  created() {
    this.vocab = vocab;
    this.selectedLocale(this.locale);

    this.scrollHeader();
  },
  methods: {
    scrollHeader() {
      // при скроле
      window.onscroll = () => {
        let scrollPosY = window.pageYOffset | document.body.scrollTop;
        if (scrollPosY > 100) {
          this.scrollActive = true;
        } else if (scrollPosY <= 100) {
          this.scrollActive = false;
        }
      };
    },
    createRouteLink(url) {
      return this.routes.home + url;
    },
    showLoginHandler() {
      this.showLogin = true;
    },
    closeLoginModal() {
      console.log("closeLoginModal");
      this.showLogin = false;
    },
    selectLanguage(index) {
      this.language = this.languages[index];
      this.changeLang = false;

      axios
        .get(`${this.routes.locale}/${this.languages[index].slag}`)
        .then((res) => {
          console.log(res);
          location.reload(true);
        });
    },
    selectedLocale(slag) {
      let lang = this.languages;
      for (let i = 0; i < lang.length; i++) {
        if (lang[i].slag === slag) {
          this.language = lang[i];
        }
      }
    },
    showMenuToggle() {
      if (window.innerWidth <= 1200) {
        this.showMenu = !this.showMenu;
      }
      if (this.showMenu && window.innerWidth <= 1200) {
        document.body.classList.add("overflow-off");
      } else {
        document.body.classList.remove("overflow-off");
      }
    },
  },
  watch: {
    showLogin(val) {
      console.log(val);
    },
  },
};
</script>

<style lang="scss">
.header {
  padding: 20px 15px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: var(--header-height);

  &-bg {
    --header-color: var(--color-header-bg-base);
    background: rgba(0,0,0,0.5);
    border-bottom: 1px solid rgba(0,0,0,0);
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    z-index: 5;
    transition: 0.2s ease-in-out;
    @media (max-width: 1200px) {
      background: var(--header-color);
    }

    &--scroll {
      --header-color: var(--color-header-bg-scrolled);
      border-bottom: 1px solid rgba(0,0,0,.1);
      background: var(--header-color);

      @media (max-width: 1200px) {
        --header-color: var(--color-header-bg-base);
      }
    }
  }

  &__nav {
    @media (max-width: 1200px) {
      color: white;
      overflow: auto;
      position: fixed;
      top: var(--header-height);
      left: 0;
      right: 0;
      bottom: calc(100% - var(--header-height));
      background: var(--header-color);
      visibility: hidden;
      opacity: 0;
      transition: 0.3s ease-in-out;
    }

    @media (max-width: 1199px) {
    }
  }

  &-nav {
    &__actions {
      @media (max-width: 1200px) {
        display: none;
      }
    }

    &__list {
      display: flex;
      align-items: center;
      list-style-type: none;
      margin: 0;
      @media (max-width: 1200px) {
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
      }
    }

    &-list {
      &__mobile-btn {
        @media (min-width: 1201px) {
          display: none;
        }
      }

      &__link {
        position: relative;
        display: block;
        padding: 5px;
        margin: 0 15px;
        text-decoration: none;
        transition: 0.1s ease-in-out;
        color: var(--color-text);
        font-weight: 600;

        &:hover {
          color: #a1b0be;
        }

        &--reversed {
          color: #07d27d;

          &:hover {
            color: #0db56f;
          }
        }
      }

      &__btn {
        position: relative;
        display: block;
        margin: 5px 15px;
        font-weight: bold;
        text-decoration: none;
        transition: 0.1s ease-in-out;
      }
    }
  }

  &__btn {
    display: none;
    position: relative;
    width: 30px;
    height: 20px;
    cursor: pointer;

    &.active {
      .header-btn__line {
        &:nth-child(1) {
          transform: rotate(37deg);
        }
        &:nth-child(2) {
          top: 0;
          opacity: 0;
          transform: rotate(37deg);
        }
        &:nth-child(3) {
          transform: rotate(-37deg);
        }
      }

      & + .header__nav {
        bottom: 0;
        opacity: 1;
        visibility: unset;
      }
    }

    @media (max-width: 1200px) {
      display: block;
    }
  }

  &-btn {
    &__line {
      position: absolute;
      left: 0;
      width: 30px;
      height: 2px;
      background: var(--color-menu-bg);
      transform-origin: left center;
      transition: 0.3s ease-in-out;

      &:nth-child(1) {
        top: 0;
      }
      &:nth-child(2) {
        top: 9px;
      }
      &:nth-child(3) {
        bottom: 0;
      }
    }
  }
}
</style>
