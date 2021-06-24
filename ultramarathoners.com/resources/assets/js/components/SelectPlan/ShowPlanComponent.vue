<template>
    <div class="col-lg-6 col-md-5">
        <div class="plan">
            <div class="item">

                <div class="select-2">
                    <h2 class="select_result" @click="showSelectPlan = !showSelectPlan">{{ currentPlan.title }}</h2>
                    <transition name="select_plan">
                        <ul class="select_selector" v-if="showSelectPlan">
                            <li v-for="(plan,key) in plans" :key="key" :data-price="plan.price"
                                @click="selectedPlanHandler(plan)">{{ plan.plan_text[0].title }}
                            </li>
                        </ul>
                    </transition>
                </div>

            </div>
            <div class="item">
                <div class="plan__price"><span class="js-price-num"></span>{{ this.currentPlan.price }}
                    €
                </div>
            </div>
            <div class="item">
                <div class="plan__period js-period-books">{{ this.currentPlan.text1 }}</div>
            </div>
            <div class="item">
                <div class="plan__workout js-period-plan">{{ this.currentPlan.text2 }}</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ShowPlanComponent",
        props:['currentPlan','plans'],
        data(){
          return {
              showSelectPlan: false,
          }
        },
        methods:{
            selectedPlanHandler(plan) {
                this.showSelectPlan = false;
                this.$emit("changeCurrentPlan", plan);
            },
        }
    }
</script>

<style scoped>

</style>
