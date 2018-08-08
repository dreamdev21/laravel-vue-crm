// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import VueSweetalert2 from 'vue-sweetalert2'
import VueGoogleAutocomplete from 'vue-google-autocomplete'
import App from './App'
import router from './router'

Vue.use(BootstrapVue)
Vue.use(VueSweetalert2)

import Axios from 'axios'
Vue.prototype.$http = Axios;

// import Vuex from 'vuex';
// Vue.use(Vuex);
// import createPersistedState from 'vuex-persistedstate'
// import * as Cookies from 'js-cookie'


import Vuex from 'vuex';
Vue.use(Vuex);
import VuexPersistence from 'vuex-persist'
const vuexLocal = new VuexPersistence({
    storage: window.localStorage
})

const store = new Vuex.Store({
    state: {
        user: null,
        token: null // default value
    },
    getters: {
        getUser() {
            return state.user
        }
    },
    mutations: {
        changeUser(state, user) {
            console.log('Mutation: changeuser to', user)
            state.user = user
        },
        changeToken(state, token){
            state.token = token
        }
    },
    plugins: [vuexLocal.plugin]
})

import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

/* eslint-disable no-new */
new Vue({
    el: '#app',
    router,
    store,
    template: '<App/>',
    components: {
        App
    }
})
