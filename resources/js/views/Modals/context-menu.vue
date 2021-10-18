<template>
    <div class="main-wrapper">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Оплата Клиента</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" @click="closecontext">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="OplataOrder">
                        <div class="form-group">
                            <label  class="col-form-label">Клиент:  {{KlientName}}</label><br>
                            <label  class="col-form-label">Счет:  {{Dolg}}</label>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Сумма:</label>
                            <input type="number" class="form-control" v-model="dogovor_price" name="dogovor_price" id="recipient-name">
                        </div>
                        <div class="modal-footer">
                            <button type="submit"  class="btn btn-primary">Оплатит</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import {mapActions} from 'vuex'
export default {
    props:{
        KlientName:{
            type:String
        },
        OrderId:{
            type:[String,Number]
        },
        Dolg:{
            type:String
        }
    },
    data() {
        return{
            dogovor_price:0
        }
    },
    methods:{
        closecontext(){
            this.$emit('closecontext')

        },
        OplataOrder() {
            let obj ={
                id:this.OrderId,
                dogovor_price:this.dogovor_price
            }
          this.$store.dispatch('orderdogovor/oplataKlient',obj)
            this.dogovor_price=0
        }
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
