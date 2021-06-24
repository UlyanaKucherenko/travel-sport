<template>

    <div class="choose-room">
        <label for="choose-room" class="choose-room__lbl">Выеберите зал:</label>
        <select id="choose-room" class="choose-room__sel" @change="changeLocation">
            <option value="" disabled selected>Название зала</option>
            <option v-for="item in locations" :value="item.slug" :selected="item.slug === selectedLocation.slug">{{ item.name }}</option>
        </select>
    </div>

</template>

<script>

    import {mapState, mapMutations, mapActions} from 'vuex';
    import * as _ from "lodash";

    export default {
        name: "SelectLocation",
        props:{
            locations:{},
        },
        computed:{
            ...mapState([
                'selectedLocation',
            ])
        },
        methods:{
            changeLocation(e){
                const findLocation = _.find(this.locations, el => el.slug === e.target.value);
                if(findLocation){
                    this.setSelectedLocation(findLocation);
                }
            },
            ...mapMutations([
                'setSelectedLocation'
            ])
        },
        mounted(){
            this.setSelectedLocation(this.locations[0]);
        },
    }
</script>

<style scoped>

</style>