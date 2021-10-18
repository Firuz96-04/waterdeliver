require('./bootstrap');

import Vue from 'vue'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import store from './store/index.js'
import App from './App.vue'
Vue.use(VueAxios,axios)

 new Vue({
    el: '#app',
     router,
     store,
    render:h => h(App)
});
