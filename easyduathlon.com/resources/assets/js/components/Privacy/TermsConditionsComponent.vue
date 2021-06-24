<template>
    <section id="terms-conditions">
        <div class="bg-img"></div>
        <div class="container" v-html="this.vocab[this.locale].content"></div>
    </section>
</template>

<script>

    import vocab from '../../translates/terms_conditions';

    export default {
        name: "TermsConditionsComponent",
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