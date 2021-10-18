import axios from 'axios'
export default {
      namespaced:true,
    state:{
        klient:[],
        message:'message'
    },
    mutations:{
        mutKlient(state,obj) {
            state.klient = obj
        },

    },
    actions:{
         showClient({commit},val) {
            axios
                .get('/api/klient?search='+val)
                .then( (response) => {
                    commit('mutKlient',response.data.klient)
                })
        },
        addClient({commit,dispatch},obj) {
                axios
                    .post('api/klient',obj)
                    .then( (response) => {
                        dispatch('showClient','')

                    })
        }
        },
    getters:{
           getKlient(state) {
               return state.klient
           },
        getMessage(state) {
               return state.message
        }
    }

}
