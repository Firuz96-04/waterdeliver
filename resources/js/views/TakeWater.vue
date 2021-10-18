<template>
    <div class="container">
        <div v-show="menushow" id="context-menu" ref="blok_menu">
            <div @click="showItem" class="item">Option 1</div>

        </div>
        <input type="text" class="form-control m-1" @keyup="showTakeWater(search)" placeholder="поиск" v-model="search">
       <div>
           <span>Количество воды: {{count_water}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
           <span>Стоимост воды: {{summ_water}}</span>
       </div>
        <div class="ex3" >
            <table class="table table-hover table-bordered" ref="menu">
                <thead>
                <tr>
                    <th>Код</th>
                    <th>Название</th>
                    <th>Дата</th>
                    <th>Количество воды</th>
                    <th>Стоимовст</th>
                </tr>
                </thead>

                <tbody>
                <tr  v-for="take in getTakeWater" :key="take.id">
                    <td>{{take.id}}</td>
                    <td> {{take.klient_name}}</td>
                    <td>{{take.take_date}}</td>
                    <td>{{take.water_column}}</td>
                    <td> {{take.water_summ}}</td>
                </tr>
                </tbody>

            </table>
        </div>

    </div>
</template>

<script>
import contextMenu from './Modals/context-menu'
import {mapGetters,mapActions,mapState} from 'vuex'
export default {
    components:{
        contextMenu
    },
data() {
    return {
        sana:null,
        search:'',
        stuff:[],
        menushow:false
    }
},
    methods:{
        showItem() {
            console.log(1)
        },
                showSetting() {
              this.$refs.menu.addEventListener('contextmenu',(event)=>{
                  event.preventDefault()
                  const {clientX: mouseX,clientY: mouseY} = event;
                  this.$refs.blok_menu.style.top = `${mouseY}px`
                  this.$refs.blok_menu.style.left = `${mouseX}px`
                  this.menushow =true
              })
                    this.$refs.menu.addEventListener('click',(event) =>{
                        this.menushow=false
                    })
                },
            ...mapActions('takewater',['showTakeWater']),
        current_date() {

            let data = new Date().toLocaleDateString()
            let cur_date = data.split('.').reverse().join('-')
                this.sana = cur_date
            }
    },
    computed:{
        ...mapGetters('takewater',['getTakeWater','getHuman']),
        ...mapState('takewater',['count_water','summ_water'])
    },
mounted() {
        this.showSetting()
},
    created() {
        this.showTakeWater(this.search)
        this.current_date()
    }
}
</script>
<style scoped>
.ex3 {

    width: auto;
    height:90vh;
    overflow: auto;
}
th{
    position: sticky;
    top: 0;
    z-index: 2;
    background: #5084E7;
}
tr{
    cursor: pointer;
}
.task2{
    background: #b18de7;
}
#context-menu{
    position: fixed;
    z-index: 10000;
    width: 150px;
    background: #65d4ef;
    border-radius: 5px;
    display: block;
}
#context-menu .item{
    padding: 8px 10px;
    font-size: 15px;
    color: #eee;
    cursor: pointer;
    border-radius: inherit;
}
</style>
