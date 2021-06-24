<template>

    <div class="col-xs-4 col-sm-4 col-md-3 date-today">
        <font-awesome-icon icon="chevron-left" @click="subToSelectedDate"/>
        <span class="date-today__date">{{ showDate }}</span>
        <font-awesome-icon icon="chevron-right" @click="addToSelectedDate"/>
    </div>

</template>

<script>

    import {mapState, mapMutations, mapActions} from 'vuex';
    export default {
        name: "ChangeDateByStep",
        props: {
            locale: {
                type: String,
                require: true
            }
        },
        created() {
            Vue.moment.locale(this.locale);
        },
        computed:{
            ...mapState([
                'selectedDate',
            ]),
            showDate(){
                return(Vue.moment(this.selectedDate).format("MM/DD/YYYY, dd") );
            },
        },
        methods:{
            ...mapMutations([
                'addToSelectedDate', 'subToSelectedDate'
            ])
        },

    }

</script>

<style scoped>
    .date-today{
        color: #9B9B9B;
    }
</style>