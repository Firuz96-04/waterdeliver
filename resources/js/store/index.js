import Vue from 'vue'
import Vuex from 'vuex'

import klient from './klient'
import dogovor from "./dogovor"
import orderdogovor from './order-dogovor'
import waterPrice from "./waterPrice"
import takewater from "./take-water";
Vue.use(Vuex)

export default new Vuex.Store({
        modules:{
                klient,
                dogovor,
                waterPrice,
                orderdogovor,
                takewater
        }
})

