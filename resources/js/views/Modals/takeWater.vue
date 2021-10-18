<template>
    <div class="main-wrapper">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Отправит воду</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span  aria-hidden="true" @click="takemodalClose">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="EditOrder">
                        <div v-if="false" class="form-group">
                            <input hidden="hidden"  type="text" class="form-control" disabled="disabled" name="id" v-model="takeObj.id"  id="recipient-name1">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name2" class="col-form-label">Название:  </label>
                            <input disabled="disabled" type="text"  class="form-control" name="klient_name" id="recipient-name2" v-model="takeObj.klient_name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name3" class="col-form-label">Дата</label>
                            <input type="date" class="form-control" name="take_date" v-model="takeObj.take_date"  id="recipient-name3">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name4" class="col-form-label">Количество воды</label>
                            <input type="number"  class="form-control" name="bootle" v-model="takeObj.bootle" id="recipient-name4">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button @click="EditOrder" type="button" class="wat_btn">Редактироват</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions} from 'vuex'
export default {
    props:{
        OrdId:{
            type:Number
        },
        NameKlient:{
            type:String
        }
    },
    data() {
        return {
            takeObj:{
                id:this.OrdId,
                bootle:0,
                take_date:'',
                klient_name:this.NameKlient
            }
        }
    },
    methods:{
        takemodalClose() {
            this.$emit('takemodalClose')
        },
        EditOrder() {
            if (this.takeObj.take_date !=='') {
                this.$store.dispatch('orderdogovor/updOrder', this.takeObj)
                  this.takemodalClose()
            }
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
