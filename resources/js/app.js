require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import router from './routes/routers'
import store from './vuex/store'


Vue.component('admin-component', require('./components/admin/AdminComponent').default)

const app = new Vue({
    router,
    store,
    el: '#app',
});
