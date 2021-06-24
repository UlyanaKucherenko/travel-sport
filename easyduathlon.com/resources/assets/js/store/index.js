import Vue from 'vue';
import Vuex from 'vuex';
import moment from 'moment';
Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        routes: {},
        locations: [],
        main_config: {},
        showLogin: false,
        hasLoginError: false,
        loginErrorMsg: '',
        selectedLocation: {},
        selectedDate: new Date(),
        rentDataCalendar: {},
        ordersItems: [],
        user: {},
    },
    mutations: {
        setRoutes(state, payload) {
            state.routes = payload
        },
        showLoginForm(state) {
            state.showLogin = true;
        },
        hideLoginForm(state) {
            state.showLogin = false;
        },
        setLoginError(state, payload) {
            state.hasLoginError = true;
            state.loginErrorMsg = payload.message;
        },
        setSelectedLocation(state, payload) {
            state.selectedLocation = payload;
        },
        addToSelectedDate(state) {
            state.selectedDate = moment(state.selectedDate).add({days: 1});
        },
        subToSelectedDate(state) {
            // if (moment() <= moment(state.selectedDate)) {
                state.selectedDate = moment(state.selectedDate).subtract({days: 1});
           // }
        },
        changeSelectedDate(state, payload) {
            state.selectedDate = payload;
        },
        setRentItemsDataCalendar(state, payload) {
            state.rentDataCalendar = payload
        },
        setRentItem(state, payload) {
            const {ordersItems} = state;
            ordersItems.push(payload);
            state.ordersItems = ordersItems;
        },
        removeFromOrder(state, payload) {
            const {ordersItems} = state;
            ordersItems.splice(payload, 1);
            state.ordersItems = ordersItems;
        },
        setErrorItems(state, payload) {
            console.log(payload);

            state.ordersItems = state.ordersItems.map(el => {
                return _.findIndex(payload, errorEl => errorEl.day === el.day && errorEl.location_id === el.location.id && errorEl.time === el.time) >= 0
                    ? {...el, error: true}
                    : el;
            });
        },
        setUser(state, payload) {
            state.user = payload;
        },
    },
    getters: {
        isAdmin: (state, getters) => {
            return state.user.role === 'admin' || false;
        },
        isLOggedIn: (state, getters) => {
            return state.user || false;
        }
    },
    actions: {
        getRentItemsData({commit, state}) {
            console.log('getRentItemsData');
            Vue.axios.get(
                state.routes.bookingInfo
            )
                .then(res => {
                    console.log(res.data.data);
                    commit('setRentItemsDataCalendar', res.data.data);
                })
                .catch(err => {
                    console.log(err);
                })
        },
    }
});

export default store;