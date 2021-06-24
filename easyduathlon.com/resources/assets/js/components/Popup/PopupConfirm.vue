<template>
    <transition name="fade">
        <div class="popup-wrapper" v-if="showConfirm">
            <div class="popup confirm">

                <div class="popup-title">
                    Confirm
                    <div class="popup-close" @click.stop="closeConfirm" data-close="true"></div>
                </div>

                <div class="popup-content">
                    <p>
                        Are you sure?
                    </p>
                </div>

                <div class="popup-footer">
                    <a :href="unsubscribe_route" class="popup-btn popup-btn--green">Yes</a>
                    <div class="popup-btn popup-btn--red" @click.stop="closeConfirm" data-close="true">No</div>
                </div>

            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        name: "Confirm",
        props: ['showConfirm', 'unsubscribe_route'],
        methods: {
            closeConfirm(e) {
                if (e.target.hasAttribute("data-close")) {
                    this.$emit("closeConfirm");
                }
            },
            unsubscribe(e) {
                if (e.target.hasAttribute("data-yes")) {
                    this.$emit("unsubscribe");
                }
            },
        }
    }
</script>

<style scoped>

</style>
