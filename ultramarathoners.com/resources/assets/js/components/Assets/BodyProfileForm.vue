<template>
    <div class="profile-block__body">
        <form class="form" @submit.prevent="validateAnthropometricSubmit" :data-vv-scope="'body'" id="body" name="body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form__row">
                        <span class="required-text">{{ errors.first('body.purpose') }}</span>
                        <label class="form__lbl">{{ this.vocab[this.locale].purpose }}</label>
                        <select class="form__sel" v-model="data.purpose" name="purpose">
                            <option value="" selected disabled>Choose Purpose</option>
                            <option value="0">Do yoga once a day</option>
                            <option value="1">Attend a live class once a week</option>
                            <option value="2">Focus on a new pose once a week</option>
                            <option value="3">Meditate for 20 minutes every day</option>
                        </select>
                    </div>
                    <div class="form__row">
                        <span class="required-text">{{ errors.first('body.height') }}</span>
                        <label class="form__lbl">{{ this.vocab[this.locale].height }}</label>
                        <input
                                v-validate="'required|numeric'"
                                :class="{'required': errors.has('body.height') }"
                                name="height"
                                class="form__inp"
                                v-model="data.height"
                                :placeholder="this.vocab[this.locale].height">
                    </div>
                    <div class="form__row">
                        <span class="required-text">{{ errors.first('body.weight') }}</span>
                        <label class="form__lbl">{{ this.vocab[this.locale].bodyWeight }}</label>
                        <input
                                v-validate="'required|numeric'"
                                :class="{'required': errors.has('body.weight') }"
                                name="weight"
                                class="form__inp"
                                v-model="data.weight"
                                :placeholder="this.vocab[this.locale].bodyWeight">
                    </div>
                    <div class="form__row">
                        <span class="required-text">{{ errors.first('body.hip') }}</span>
                        <label class="form__lbl">{{ this.vocab[this.locale].hipCircumference }}</label>
                        <input
                                v-validate="'required|numeric|min_value:1'"
                                :class="{'required': errors.has('body.hip') }"
                                name="hip"
                                class="form__inp"
                                v-model="data.hip"
                                :placeholder="this.vocab[this.locale].hipCircumference">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form__row">
                        <span class="required-text">{{ errors.first('body.systolic') }}</span>
                        <label class="form__lbl">{{ this.vocab[this.locale].systolicBlood }}</label>
                        <input
                                v-validate="'required|numeric|min_value:1'"
                                :class="{'required': errors.has('body.systolic') }"
                                name="systolic"
                                class="form__inp"
                                v-model="data.systolic"
                                :placeholder="this.vocab[this.locale].systolicBlood">
                    </div>
                    <div class="form__row">
                        <span class="required-text">{{ errors.first('body.diastolic') }}</span>
                        <label class="form__lbl">{{ this.vocab[this.locale].diastolicBlood }}</label>
                        <input
                                name="diastolic"
                                class="form__inp"
                                v-validate="'required|numeric|min_value:1'"
                                :class="{'required': errors.has('body.diastolic') }"
                                v-model="data.diastolic"
                                :placeholder="this.vocab[this.locale].diastolicBlood">
                    </div>
                    <div class="form__row">
                        <button type="submit" class="form__btn">
                            {{ this.vocab[this.locale].btnSave }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import vocab from '../../translates/member_area/profile';
    export default {
        name: "BodyProfileForm",
        props: {
            user: {
                type: Object,
                require: true
            },
            data: {
                type: Array,
                require: true
            },
            routes: {
                type: Object,
                require: true
            },
            locale: {
                type: String,
                require: true
            }
        },
        methods: {
            updateUserHandler() {
                console.log("updateUserHandler");
                console.log({...this.user, data: this.data});

                axios({
                    method: "post",
                    url: this.routes.updateProfile,
                    data: {...this.user, data: this.data}
                })
                    .then(res => {
                        console.log(res.data);
                        if (res.data.update === true) {
                            location.href = this.routes.profile;
                        }
                    })
            },
            validatePersonalSubmit() {
                this.$validator.validateAll('personal').then((result) => {
                    if (result) {
                        console.log('%c Form Submitted!', 'color: green; font-weight: 600;');
                        this.updateUserHandler();
                        return;
                    }

                    console.log('%c Correct them errors!', 'color: red; font-weight: 600;');
                });
            },
            validateAnthropometricSubmit() {
                this.$validator.validateAll('body').then((result) => {
                    if (result) {
                        console.log('%c Form Submitted!', 'color: green; font-weight: 600;');
                        this.updateUserHandler();
                        return;
                    }

                    console.log('%c Correct them errors!', 'color: red; font-weight: 600;');
                });
            }
        },
        created() {
            this.vocab = vocab;
        },
    }
</script>
