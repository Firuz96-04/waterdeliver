<template>
    <div class="main-wrapper">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" @click="close">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Компания</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="company_name" v-model="klient.company_name" placeholder="Компания">
                         </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Должност</label>
                            <input type="text" class="form-control" name="doljnost" v-model="klient.doljnost" placeholder="Должност" id="exampleFormControlInput2">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Имя</label>
                            <input type="text" class="form-control" name="name" v-model="klient.name" placeholder="Имя">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Фамилия</label>
                            <input type="text" class="form-control" name="last_name" v-model="klient.last_name" placeholder="Фамилия">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Адресс</label>
                            <input type="text" class="form-control" name="adress" v-model="klient.adress" placeholder="Адресс">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Контакт</label>
                            <input type="text" class="form-control" name="phone" v-model="klient.phone" placeholder="Контакт">
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" @click="addKlient"  class="wat_btn">Добавит Клиента</button>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import {mapActions,mapGetters} from 'vuex'
import klient from "../../store/klient";
export default {
        data() {
            return{
                klient:{
                    company_name:'',
                    doljnost:'',
                    name:'',
                    last_name:'',
                    adress:'',
                    phone:'',

                }
            }
        },
    methods:{
        close(){
            this.$emit('close')
        },
        addKlient() {
            this.$store.dispatch('klient/addClient',this.klient)
                this.company_name=''
            this.close()
        }
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
.content{
    height: auto;
    width: 400px;
    background: #98dfb6;
    border: none;
    border-radius: 5px;
}
.form-klient{
    padding: 10px;
}
.close-klient{
    padding: 5px 10px;
    background: #3495e3;
    border-radius: 5px;
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
