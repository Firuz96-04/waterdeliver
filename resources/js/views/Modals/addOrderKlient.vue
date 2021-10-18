<template>
    <div class="main-wrapper">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Заказ воды</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" @click="close">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Заказчик</label>
                            <select class="form-control" v-model="orderdogovorObj.dogovor_id" id="exampleFormControlSelect1">
                                <option></option>
                                <option v-for="getDog in getDogovorSelect" :value="getDog.klient.id">
                                    {{getDog.klient.company_name}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name2" class="col-form-label">Начало Договора</label>
                            <input type="date" class="form-control" name="date_start" v-model="orderdogovorObj.date_start" id="recipient-name2">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name3" class="col-form-label">Конец Договора</label>
                            <input type="date" class="form-control" name="date_end" v-model="orderdogovorObj.date_end" id="recipient-name3">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name4" class="col-form-label">Оплата</label>
                            <input type="number" class="form-control" name="dogovor_price" v-model="orderdogovorObj.dogovor_price" id="recipient-name4">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button  @click="addOrder" class="btn btn-primary">Добавит Заказ</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapGetters,mapActions} from 'vuex'
export default {
    data() {
        return {
            orderdogovorObj:{
                dogovor_id:null,
                date_start:null,
                date_end:null,
                dogovor_price:0
            },
            takeExample:''
        }
    },
    methods:{
        addOrder(){
            this.$store.dispatch('orderdogovor/addOrder',this.orderdogovorObj)
            this.close()
        },
        close() {
             this.$emit('close');
        },
        showOrderDog() {
            return this.$store.dispatch('orderdogovor/showDogovor')
        },
        showDogovor() {
            return this.$store.dispatch('dogovor/ShowDogovorSelect')
        },

    },
    computed:{
        ...mapGetters('dogovor',['getDogovorSelect'])
    },
    mounted() {
        this.showDogovor()
    }
}
</script>
<style scoped>
.main-wrapper{
    display: flex;
    position: fixed;
    justify-content:center;
    align-items: center;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1050;
    background: rgba(0,0,0,.4);
}

</style>
