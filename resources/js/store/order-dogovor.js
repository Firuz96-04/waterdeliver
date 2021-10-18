import axios from "axios";
export default {
    namespaced:true,
    state:{
        dogovor:[],
    },
    mutations:{
        mutDogovor(state, obj) {
            return state.dogovor = obj
        }
    },
    actions:{
        showDogovorOrder({commit},val) {
            axios
                .get('api/order-dogovor?search='+val)
                .then((response)=> {
                    commit('mutDogovor',response.data.orderDogovor)
                })
        },
        addOrder({dispatch},obj){
            axios
                .post('api/order-dogovor',obj)
                .then((response) => {
                    dispatch('showDogovorOrder','')
                })
        },
        updOrder({dispatch},obj) {
                axios
                    .post('api/order-dogovor/'+obj.id,obj)
                    .then((response) => {
                        dispatch('showDogovorOrder','')
                    })
        },
        async oplataKlient({dispatch},obj) {
            await axios
                .post('api/order-dogovor/oplataupdate/'+obj.id,obj)
                .then((res) => {
                    dispatch('showDogovorOrder','')
                })
        }
    },
    getters:{
        getDogovor(state) {
           // console.log(response.data.orderDogovor)
              return state.dogovor
        }
    }
}
