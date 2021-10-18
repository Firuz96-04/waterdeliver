<template>
    <div>
        <add-klient v-show="addModal" @close="close"></add-klient>
        <button class="wat_btn" @click="addModal=true">Добавит Клиента</button>
        <input type="text" class="form-control" @keyup="showClient(search)" v-model="search" placeholder="Поиск">
        <div class="ex3" style="height: 100vh;">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Код</th>
                    <th>Заказчик</th>
                    <th>Должност</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Адресс</th>
                    <th>Контакты</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="klient in getKlient" :key="klient.id">
                    <td>{{klient.id}}</td>
                    <td>{{klient.company_name}}</td>
                    <td>{{klient.doljnost}}</td>
                    <td>{{klient.name}}</td>
                    <td>{{klient.last_name}}</td>
                    <td>{{klient.adress}}</td>
                    <td>{{klient.phone}}</td>
                </tr>
                </tbody>
            </table>
        </div>


    </div>
</template>
<script>
import addKlient from './Modals/addKlient'
import {mapGetters,mapActions} from 'vuex'
export default {
    components:{
        'add-klient':addKlient
    },
    data() {
        return {
            addModal:false,
            search:''
        }
    },
    watch:{
        // search(event) {
        //     console.log(event)
        // }
    },
    methods:{
      ...mapActions('klient',['showClient']),
        close(){
            this.addModal = false
        },
    },
    computed:{
      ...mapGetters('klient',['getKlient'])
    },
    mounted() {
   //   this.$store.dispatch('klient/showClient')
        this.showClient(this.search)
    }
}
</script>
<style scoped>

th{
    position: sticky;
    top: 0;
    z-index: 2;
    background: #5084E7;
}
.ex3 {
    width: auto;
    height:100vh;
    overflow: auto;
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
</style>
