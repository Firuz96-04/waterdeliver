<template>
    <div class="main-wrapper" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Договор</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span  aria-hidden="true" @click="close">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="EditOrder">
                        <div class="form-group">
                            <label for="recipient-name1" class="col-form-label">Название: </label>
                            <input type="text" class="form-control" name="name"  v-model="name" id="recipient-name1">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name2" class="col-form-label">Счет:</label>
                            <input type="text" class="form-control" name="schet" v-model="DogovorObj.schet"   id="recipient-name2">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name3" class="col-form-label">МФО</label>
                            <input type="text" class="form-control" name="client_mfo" v-model="DogovorObj.client_mfo" id="recipient-name3">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name4" class="col-form-label">ИНН</label>
                            <input type="text" class="form-control" name="client_inn" v-model="DogovorObj.client_inn" id="recipient-name4">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name5" class="col-form-label">Коментарии</label>
                            <input type="text" class="form-control" name="client_comment" v-model="DogovorObj.client_comment" id="recipient-name5">
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
        DogovorObj: {
            type: Object,
            default:()=>{
                return {
                }
            }
        },
        name:{
            type:String
        }
    },
    data(){
        return {

        }
    },
    methods:{
        EditOrder(){
            this.$store.dispatch('dogovor/EditDogovor',this.DogovorObj)
        },
        close() {
            this.$emit('close')
        }
    },
    mounted() {

    }
}
</script>
<style>
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
.modal-content{
    width: 500px;
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
