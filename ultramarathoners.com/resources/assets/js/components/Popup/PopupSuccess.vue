<template>
    <transition name="fade">
        <div class="popup-wrapper" v-if="showPopup">
            <div class="popup" :class="popupType">

                <div class="popup-title">
                    {{popupType}}!
                    <div class="popup-close" @click.stop="closePopup" data-close="true"></div>
                </div>

                <div class="popup-content">
                    <p>
                        {{ msgText }}
                    </p>
                </div>

            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        name: "PopupSuccess",
        props: ['msgText', 'showPopup', 'popupType'],
        methods: {
            closePopup(e) {
                if (e.target.hasAttribute("data-close")) {
                    this.$emit("closePopup");
                }
            },
        }
    }
</script>

<style scoped>

</style>
