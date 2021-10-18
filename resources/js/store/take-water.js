import axios from "axios";
export default {

    namespaced:true,
    state:{
        takewater:[],

        count_water:0,
        summ_water:0,
        messageTake:'Takemessage'
    },
    mutations:{
        mutTakeWater(state,obj){
          return   state.takewater = obj
        }
    },
    actions:{
      async  showTakeWater({commit,state},val) {
          await axios
                .get('api/take-water?search='+val.toLowerCase())
                .then((res) => {
                    commit('mutTakeWater',res.data)
                    state.count_water=0
                    state.summ_water=0
                    state.takewater.map((item) =>{
                      state.count_water+=item.water_column
                      state.summ_water += parseFloat(item.water_summ)
                    })
                })
        }
    },
    getters:{
        getTakeWater(state) {
            return state.takewater
        },
        getHuman(state){
            return state.peoples
        }
    }
}
