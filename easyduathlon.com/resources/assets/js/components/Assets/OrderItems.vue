<template>

    <div class="booking-footer">
        <div class="booking-footer__title">Данные бронирования</div>

        <div :class="`booking-footer__row ${cssClass(item)}`" v-for="(item, i) in ordersItems" :key="`${item.day}_${item.time}_${i}`">
            <div class="booking-footer__col"><b>Дата:</b> {{ item.day | moment("DD.MM.YYYY, dd") }}</div>
            <div class="booking-footer__col"><b>Время:</b> {{ time(item.time) }}</div>
            <div class="booking-footer__col"><b>Цена:</b> {{ item.price }} грн.</div>
            <div class="booking-footer__col"><b>Зал:</b> {{ item.location.name }}</div>
            <div class="booking-footer__btn-close" @click="removeFromOrder(i)"></div>
        </div>
    </div>

</template>

<script>
    import moment from 'moment';
    import {mapState,mapMutations} from 'vuex';

    export default {
        name: "OrderItems",
        computed:{
            ...mapState([
                'ordersItems','selectedLocation'
            ])
        },
        methods:{
            time(t){
                return `${t}.00 - ${t+1}.00`;
            },
            cssClass(data){
                return data.error?"error-item":'';
            },
            ...mapMutations([
                'removeFromOrder'
            ])
        }
    }
</script>

<style scoped>
    .error-item{
        color: red;
        text-decoration: line-through;
    }
</style>