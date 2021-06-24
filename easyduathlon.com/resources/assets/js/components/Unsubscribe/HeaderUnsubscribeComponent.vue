<template>
    <header id="header-unsubscribe">
        <div class="header">
            <div class="logo">
                <img src="/img/logo.png" alt="Logo">
                <span class="logo__text">easyduathlon.com</span>
            </div>
            <div class="navbar-list" :class="{'toggleActive': menuToggle}">
                <ul>
                    <li><a class="active" href="/home_unsubscribe">{{ this.vocab[this.locale].home }}</a></li>
                    <li><a class="" href="/my_subscriptions">{{ this.vocab[this.locale].subscription }}</a></li>
                    <li><a class="" href="#">{{ this.vocab[this.locale].faq }}</a></li>
                </ul>
            </div>
            <div class="menu-icon" :class="{'effect': menuToggle}" @click="menuToggle = !menuToggle">
                <div class="menu-icon-line"></div>
            </div>
        </div>
    </header>
</template>

<script>

    import vocab from '../../translates/unsubscribe/header_unsubscribe';

    export default {
        name: "HeaderUnsubscribeComponent",
        props: {
            locale: {
                type: String,
                require: true
            }
        },
        data() {
            return {
                vocab: {},
                menuToggle: false
            }
        },
        created() {
            this.vocab = vocab;
        }
    }
</script>

<style scoped>

</style>
