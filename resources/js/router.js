import Vue from 'vue'
import Router from 'vue-router'

import Klient from './views/Klient.vue'
import Dogovor from './views/Dogovor.vue'
import OrderDogovor from './views/OrderDogovor.vue'
import TakeWater from "./views/TakeWater";
Vue.use(Router)

const router = new Router({
    routes:
    [
        {
            path:'/klient',
            name:'klient',
            alias:'/',
            component:Klient
        },
        {
            path:'/dogovor',
            name:'dogovor',
            component:Dogovor
        },
        {
            path:'/orderdogovor',
            name:'orderdogovor',
            component:OrderDogovor
        },
        {
            path:'/take-water',
            name:'take-water',
            component:TakeWater
        }

    ],
    mode:"history"

})

export default router
