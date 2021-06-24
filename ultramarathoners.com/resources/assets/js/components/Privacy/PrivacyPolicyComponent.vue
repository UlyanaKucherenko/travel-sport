<template>
    <section id="privacy-policy">
        <div class="bg-img"></div>
        <div class="container" v-html="this.vocab[this.locale].content"></div>
    </section>
</template>

<script>
    import vocab from '../../translates/privacy_policy';

    export default {
        name: "PrivacyPolicyComponent",
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

<style>
    #privacy-policy a {
        color: #00b3ee;
    }
</style>