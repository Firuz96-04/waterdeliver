import axios from "axios";

export default  {
    namespaced:true,
    state:{
        dogovor:[],
        dogovorSelect:[]
    },
    mutations:{
        mutDogovor(state,obj){
            return state.dogovor = obj
        },
        mutDogovorSel(state,obj) {
            return state.dogovorSelect = obj
        }
    },
    actions:{
        ShowDogovorSelect({commit}) {
            axios
                .get('api/dogovor')
                .then((res) => {
                    commit('mutDogovorSel',res.data.dogovor)
                })
        },
        showDogovor({commit},val) {
                axios
                    .get('api/dogovor?search='+ val)
                    .then( (response) => {
                        commit('mutDogovor',response.data.dogovor)
                    })
        },
         EditDogovor({dispatch},obj) {
                axios
                    .patch('api/dogovor/'+obj.id,obj)
                    .then( (response) => {
                        dispatch('showDogovor','')

                    })
        }
    },
    getters:{
        getDogovor(state) {
            return state.dogovor
        },
        getDogovorSelect(state) {
            return state.dogovorSelect
        }
    }
}
