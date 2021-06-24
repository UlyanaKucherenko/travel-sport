<template>
    <div class="dash-slider">
        <div class="dash-slider__title">{{title}}</div>
        <slick ref="slick" :options="slickOptions" v-if="showSlider">
            <div class="dash-slider__slide" v-for="(slide, key) in recentBooks" :key="key">
                <div class="dash-slider__img"><img :src="`/storage/${slide.book.img}`" alt=""></div>
                <div class="dash-slider__text">{{ slide.book.title }}</div>
            </div>
        </slick>
    </div>
</template>
<script>

    import Slick from 'vue-slick';

    export default {
        name: 'RecentBooks',
        props: {
            recentBooks: {
                type: Array
            },
            title: {},
        },
        downloading: {},
        components: {Slick},
        data() {
            return {
                showSlider: true,
                slickOptions: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    speed: 1200,
                    autoplay: true,
                    arrows: true,
                    prevArrow: '<span class="dash-slider__prev"></span>',
                    nextArrow: '<span class="dash-slider__next"></span>',
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 3
                            }
                        },
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 2
                            }
                        },
                        {
                            breakpoint: 500,
                            settings: {
                                slidesToShow: 1
                            }
                        }]
                },
            }
        },
        computed: {
            len() {
                return this.recentBooks.length;
            }
        },
        methods: {
            next() {
                this.$refs.slick.next();
            },
            prev() {
                this.$refs.slick.prev();
            },
            reInit() {
                this.$nextTick(() => {
                    this.showSlider = true;
                    this.$refs.slick.reSlick();
                });
            },
        },
        watch: {
            recentBooks(newVal, oldVal) {
                this.showSlider = false;
                this.reInit();
            }
        },
    }
</script>
