<template>
    <section id="refund-policy">
        <div class="bg-img"></div>
        <div class="container" v-html="this.vocab[this.locale].content"></div>
    </section>
</template>


<script>
    import vocab from '../../translates/refund_policy';

    export default {
        name: "RefundPolicyComponent",
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
    #refund-policy a {
        color: #00b3ee;
    }
</style>