import axios from "axios";
export default  {
    namespaced:true,
    state:{
        modalWater:false,
        getPrice:0
    },
    mutations:{
        mutPrice(state,number) {
            return state.getPrice = number
        },
        mutModal(state) {
            return state.modalWater = false
        },
        mutModalHide(state) {
            return state.modalWater = true
        }
    },
    actions:{
         actPrice({commit}) {
                axios
                    .get('api/water')
                    .then((response) => {
                        commit('mutPrice',response.data.water_price)
                    })
            },
         editPrice({dispatch,commit},number) {
            axios
                .post('api/water/1',{
                    'water_price':number
                })
                .then((response) => {
                              dispatch('actPrice')
                              commit('mutModal')
                });
        }
    },
    getters:{
        getWaterPrice(state) {
            return state.getPrice
        },
        getModalWater(state) {
            return state.modalWater
        }
    },
}
