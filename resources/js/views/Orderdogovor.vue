<template>
    <div>
        <addOrderKlient  v-if="modalshow" @close="close"> </addOrderKlient>

        <contextMenu v-show="menushow" @closecontext="menushow=false" :Dolg="dolg" :OrderId="contentId" :KlientName="contentKlientName"></contextMenu>
        <take-water v-if="takemodal" @takemodalClose="takemodalClose" :OrdId="takeId" :NameKlient="takeName" ></take-water>
                <div class="ta">
                   <div class="ml-2" >
                    <input type="text" class="form-control" @keyup="showDogovorOrder(search)" v-model="search" style="width: 400px" placeholder="поиск">
                   </div>
                    <div>
                        <span style="font-weight: bold;font-size: 18px;color: #ea6565">
                            Должники: {{doljnik_money.length}}
                        </span>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span style="font-weight: bold;font-size: 18px;color: #5084E7">
                            Договор Закончился:{{dogovor_old.length}}
                        </span>
                    </div>
                    <div>
                        <button  class="wat_btn" @click="modalshow=true">Заказ воды</button>
                    </div>
                    </div>
            <div class="ex3" >
            <table class="table table-hover table-bordered" ref="menu">
                <thead>
                <tr>
                    <th>Код</th>
                    <th>Название</th>
                    <th>Начало Дог.</th>
                    <th>Конец Дог.</th>
                    <th>Текущий счёт</th>
                    <th>Клиент Заплатил</th>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="dogovor in getDogovor" :key="dogovor.id" @contextmenu="showItem(dogovor)" @click="modalTake(dogovor)" >
                        <td>{{dogovor.id}}</td>
                        <td>{{dogovor.klient.company_name}}</td>
                        <td>{{dogovor.date_start}}</td>
                        <td :class="{task2:sana>=dogovor.date_end}">{{dogovor.date_end}}</td>
                        <td :class="{task1:(dogovor.dogovor_price<0)}">{{dogovor.dogovor_price}}</td>
                        <td>{{dogovor.dogovor_price_old}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
import addOrderKlient from '../views/Modals/addOrderKlient'
import takeWater from '../views/Modals/takeWater'
import contextMenu from './Modals/context-menu'
import {mapActions,mapGetters} from 'vuex'
import axios from "axios";
export default {
    components:{
        addOrderKlient,
        takeWater,
        contextMenu
    },
    data(){
        return{
            modalshow:false,
            takemodal:false,
            takeId:'',
            takeName:'',
            sana:null,
            search:'',
            doljnik_money:[],
            dogovor_old:[],
            menushow:false,
            contentKlientName:'',
            contentId:null,
            dolg:''
        }
    },
    methods:{
        showSetting() {
            this.$refs.menu.addEventListener('contextmenu',(event)=>{
                event.preventDefault()
            })
        },
        showItem(item) {
            this.contentKlientName = item.klient.company_name
            this.contentId =item.id
            this.dolg = item.dogovor_price
            this.menushow=true
        },

        showDoljnik() {
            let info =[]
          axios
          .get('api/order-dogovor')
          .then((res) => {
              info= res.data.orderDogovor
              info.map((item) =>{
                  if (parseFloat(item.dogovor_price)<0) {
                      this.doljnik_money.push(item.dogovor_price)
                  }
              })
              info.map((item) => {
                  if (this.sana >=item.date_end) {
                    this.dogovor_old.push(item.date_end)
                  }
              })
          })
        },
        modalTake(obj) {
            this.takeId = obj.id
            this.takeName = obj.klient.company_name
            this.takemodal = true

        },
        takemodalClose() {
            this.takemodal = false
        },
        close() {
            this.modalshow=false
        },
        show(){
          let date = new Date().toLocaleDateString()
            let cur_date = date.split('.').reverse().join('-')
            this.sana = cur_date
        },
        ...mapActions('orderdogovor',['showDogovorOrder']),
    },
    computed:{
        ...mapGetters('orderdogovor',['getDogovor'])
    },
    mounted() {
        this.showSetting()
    },
    created() {
        this.showDoljnik()
        this.show()
      this.showDogovorOrder(this.search)
    }
}
</script>

<style scoped>
.ta{
    display: flex;
    align-items: center;
    justify-content: space-between;
}
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
.wat_btn{
    background: none;
    padding: 10px;
    font-size: 15px;
    color: #1b1e21;
    margin: 2px;
    font-weight: bolder;
    border: none;
    background: #aa83e5;
    border-radius: 5px;
}
.task1{
    background: rgba(238, 134, 142, 0.87);
}
.task2{
    background: #4da4e2;
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
