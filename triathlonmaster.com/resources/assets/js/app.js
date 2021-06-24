
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import axios from 'axios';
import VueAxios from 'vue-axios';
import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import queryString from 'querystring';
import VeeValidate from 'vee-validate';
import VueTheMask from 'vue-the-mask';
import {library} from '@fortawesome/fontawesome-svg-core';
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome';
import {fab} from '@fortawesome/free-brands-svg-icons';
import {fas} from '@fortawesome/free-solid-svg-icons';
import {far} from '@fortawesome/free-regular-svg-icons';
import store from './store';
import formMixin from './mixins/form'

library.add(fab, fas, far);
Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.use(BootstrapVue);
Vue.use(VeeValidate, {
    inject: true,
    classes: true,
    fieldsBagName: 'veeFields'
  });
  
// Vue.use(VeeValidate, {classes: true,});
Vue.use(VueTheMask);
Vue.use(queryString);
Vue.use(VueAxios, axios);
Vue.mixin(formMixin)

const moment = require('moment');
require('moment/locale/ru');
Vue.use(require('vue-moment'), {moment});




Vue.component('header-section', require('./components/Layout/HeaderComponent').default);
Vue.component('main-page', require('./components/MainPage/MainPageComponent').default);
Vue.component('select_plan-page', require('./components/SelectPlan/SelectPlanComponent').default);

Vue.component('menu-members', require('./components/Layout/MenuMembersComponent').default);
Vue.component('dashboard-page', require('./components/Dashboard/DashboardComponent').default);

Vue.component('trainings', require('./components/Coach/Trainings').default);
Vue.component('books-page', require('./components/Books/BooksComponent').default);
Vue.component('profile-page', require('./components/Profile/ProfileComponent').default);
Vue.component('subscription-page', require('./components/Subscription/SubscriptionComponent').default);
Vue.component('footer-section', require('./components/Layout/FooterComponent').default);


/* === UNSUBSCRIBE === */
Vue.component('header-unsubscribe-section', require('./components/Unsubscribe/HeaderUnsubscribeComponent').default);
Vue.component('home-unsubscribe-page', require('./components/Unsubscribe/HomeUnsubscribeComponent').default);
Vue.component('my-subscriptions-page', require('./components/Unsubscribe/MySubscriptionComponent').default);
Vue.component('footer-unsubscribe-section', require('./components/Unsubscribe/FooterUnsubscribeComponent').default);


/* === Privacy Policy === */
Vue.component('privacy-policy-page', require('./components/Privacy/PrivacyPolicyComponent').default);
Vue.component('terms-conditions-page', require('./components/Privacy/TermsConditionsComponent').default);
Vue.component('refund-policy-page', require('./components/Privacy/RefundPolicyComponent').default);


/*=== Popup ===*/
Vue.component('popup-success', require('./components/Popup/PopupSuccess').default);



const app = new Vue({
    el: '#app',
    store
});
