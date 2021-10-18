<template>
    <div>
            <head-vue/>
          <router-view/>
        <water-price v-if="getModalWater" @stop="stop"/>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'
import HeadVue from './components/Head-vue.vue'
import WaterPrice from './views/Water-price'
export default {
    components:{
        HeadVue,
        'water-price':WaterPrice
    },
    data() {
        return {

        }
    },
        methods:{
            stop() {
              this.$store.commit('waterPrice/mutModal',false)
            }
        },
    computed:{
        ...mapGetters('waterPrice',['getModalWater'])
    },
}
</script>
