<template>
    <div>
        <div class="head">
            <div>
                <router-link to="/klient">Клиента</router-link>
                <router-link to="/dogovor">Договора</router-link>
                <router-link to="/orderdogovor">Заказы</router-link>
                <router-link to="/take-water">Отчет</router-link>
            </div>
                 <div>
                   <button @click="showWaterModal">Стоимост Воды</button>
                   </div>
            </div>
    </div>
</template>
<script>

export default {
    methods:{
        showWaterModal() {
            this.$store.commit('waterPrice/mutModalHide')
        }
    }
}
</script>
<style>
button{
    background: none;
    padding: 10px;
    font-size: 15px;
    color: #1b1e21;
    font-weight: bolder;
    border: none;
    background: #aa83e5;
    border-radius: 5px;
}
.head{
    width: 100%;
    height: auto;
    padding: 10px;
    background: #509AE7 ;
    display: flex;
    justify-content: space-around;
    align-items: center;
    position: sticky;
}
a{
    color: #fff;
}
.head a{

    text-decoration: none;

    padding:10px 15px ;
    font-weight: bold;
   font-size: 18px;
    border: none;
}
a .router-link-exact-active, .router-link-active{
    color: #e8dc65;
}
/*a .router-link-exact-active{*/
/*    color: red;*/
/*}*/
</style>
