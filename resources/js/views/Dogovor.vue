<template>
    <div class="container">
        <DogovorEdit v-show="modalEdit" @close="close" :DogovorObj="DogovorObj" :name="klientName"></DogovorEdit>
        <input type="text" class="form-control m-1" v-model="dogSearch" @keyup="showDogovor(dogSearch)" placeholder="поиск">
        <div class="ex3">

                   <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Код</th>
                                <th>Название</th>
                                <th>Счет</th>
                                <th>МФО</th>
                                <th>ИНН</th>
                                <th>Коментарии</th>
                            </tr>
                        </thead>
                       <tbody>
                            <tr v-for="dogovor in getDogovor" :key="dogovor.id" @click="modalEditShow(dogovor)">
                                <td>{{dogovor.id}}</td>
                                <td>{{dogovor.klient.company_name}}</td>
                                <td>{{dogovor.schet}}</td>
                                <td>{{dogovor.client_mfo}}</td>
                                <td>{{dogovor.client_inn}}</td>
                                <td>{{dogovor.comment}}</td>
                            </tr>
                       </tbody>
                   </table>
        </div>
    </div>
</template>
<script>
import {mapGetters,mapActions} from 'vuex'
import DogovorEdit from './Modals/DogovorEdit.vue'
export default {
        components:{
          DogovorEdit
        },
    data() {
            return {
                    modalEdit:false,
                    DogovorObj:{},
                    klientName:'',
                    dogSearch:''
            }
    },
    methods:{
        close() {
            this.modalEdit=false
        },
        modalEditShow(obj) {

            this.modalEdit=true,

            this.DogovorObj = obj
            this.klientName=this.DogovorObj.klient.company_name

        },
        ...mapActions('dogovor',['showDogovor'])
    },
    computed:{
        ...mapGetters('dogovor',['getDogovor'])
    },

    mounted() {
        this.showDogovor(this.dogSearch)
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
    color: #FFF;
    font-weight: bolder;
    font-size: large;
}
tr{
    cursor: pointer;
}
</style>
