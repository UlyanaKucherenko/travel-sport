<template>
    <footer id="footer-unsubscribe">
        <ul class="footer-list">
            <li><a class="active" href="/home_unsubscribe">{{ this.vocab[this.locale].home }}</a></li>
            <li><a class="" href="/my_subscriptions">{{ this.vocab[this.locale].subscription }}</a></li>
            <li><a class="" href="#">{{ this.vocab[this.locale].faq }}</a></li>
        </ul>
    </footer>
</template>

<script>

    import vocab from '../../translates/unsubscribe/header_unsubscribe';

    export default {
        name: "FooterUnsubscribeComponent",
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

<style scoped>

</style>