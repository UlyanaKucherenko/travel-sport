<template>
    <div class="profile-block__body">
        <form class="form" @submit.prevent="validatePersonalSubmit" :data-vv-scope="'personal'" id="personal"
              name="personal">
            <div class="row">
                <div class="col-md-6">
                    <div class="form__row">
                        <span class="required-text">{{ errors.first('personal.FirstName') }}</span>
                        <label class="form__lbl">{{ this.vocab[this.locale].firstName }}</label>
                        <input
                                name="FirstName"
                                class="form__inp"
                                v-validate="'required'"
                                :class="{'required': errors.has('personal.FirstName') }"
                                v-model="user.first_name"
                                :placeholder="this.vocab[this.locale].firstName">
                    </div>
                    <div class="form__row">
                        <span class="required-text">{{ errors.first('personal.LastName') }}</span>
                        <label class="form__lbl">{{ this.vocab[this.locale].lastName }}</label>
                        <input
                                name="LastName"
                                class="form__inp"
                                v-validate="'required|alpha'"
                                :class="{'required': errors.has('personal.LastName') }"
                                v-model="user.last_name"
                                :placeholder="this.vocab[this.locale].lastName">
                    </div>
                    <div class="form__row">
                        <span class="required-text">{{ errors.first('personal.Email') }}</span>
                        <label class="form__lbl">{{ this.vocab[this.locale].email }}</label>
                        <input
                                name="Email"
                                class="form__inp"
                                v-validate="'required|email'"
                                :class="{'required': errors.has('personal.Email') }"
                                disabled
                                v-model="user.email"
                                :placeholder="this.vocab[this.locale].email">
                    </div>
                    <div class="form__row">
                        <span class="required-text">{{ errors.first('personal.Phone') }}</span>
                        <label class="form__lbl">{{ this.vocab[this.locale].phone }}</label>
                        <the-mask
                                name="Phone"
                                class="form__inp"
                                v-validate="'required|min:12'"
                                :class="{'required': errors.has('personal.Phone') }"
                                :mask="'+### (##) ### ## ##'"
                                :masked="false"
                                v-model="user.phone"
                                :placeholder="this.vocab[this.locale].phone"/>
                    </div>
                    <div class="form__row">
                        <span class="required-text">{{ errors.first('personal.City') }}</span>
                        <label class="form__lbl">{{ this.vocab[this.locale].city }}</label>
                        <input
                                name="City"
                                class="form__inp"
                                v-validate="'required'"
                                :class="{'required': errors.has('personal.City') }"
                                v-model="user.city"
                                :placeholder="this.vocab[this.locale].city">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form__row">
                        <span class="required-text">{{ errors.first('personal.Address') }}</span>
                        <label class="form__lbl">{{ this.vocab[this.locale].address }}</label>
                        <input
                                name="Address"
                                class="form__inp"
                                v-validate="'required'"
                                :class="{'required': errors.has('personal.Address') }"
                                v-model="user.address"
                                :placeholder="this.vocab[this.locale].address">
                    </div>
                    <div class="form__row">
                        <span class="required-text">{{ errors.first('personal.PostalCode') }}</span>
                        <label class="form__lbl">{{ this.vocab[this.locale].postalCode }}</label>
                        <input
                                name="PostalCode"
                                class="form__inp"
                                maxlength="6"
                                v-validate="'required'"
                                :class="{'required': errors.has('personal.PostalCode') }"
                                v-model="user.postal_code"
                                :placeholder="this.vocab[this.locale].postalCode"/>
                    </div>
                    <div class="form__row">
                        <span class="required-text">{{ errors.first('personal.Country') }}</span>
                        <label class="form__lbl">{{ this.vocab[this.locale].country }}</label>
                        <input
                                name="Country"
                                class="form__inp"
                                v-validate="'required'"
                                :class="{'required': errors.has('personal.Country') }"
                                v-model="user.country"
                                :placeholder="this.vocab[this.locale].country">
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
        name: "PersonalProfileForm",
        props: {
            user: {
                type: Object,
                require: true
            },
            routes: {
                type: Object,
                require: true
            },
            data: {
                type: Array,
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
