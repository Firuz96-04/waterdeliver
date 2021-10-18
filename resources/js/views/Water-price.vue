<template>
    <div class="main-wrapper" >

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Изменит Стоимост воды </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" @click="stop">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Стоимост воды:</label>
                            <input type="number" name="water_price" v-model="getWaterPrice.water_price" class="form-control" id="recipient-name">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" @click="editPrice" class="btn btn-primary">Добавит</button>
                </div>
            </div>
        </div>



            </div>

</template>
<script>
import  {mapGetters,mapActions} from 'vuex'
export default {
    methods:{
        stop() {
            this.$emit('stop')
        },
        show(event) {
            event.stopPropagation()
        },
        editPrice() {
         this.$store.dispatch('waterPrice/editPrice',this.getWaterPrice.water_price)
        },
        ...mapActions('waterPrice',['actPrice'])
    },
    computed:{
        ...mapGetters('waterPrice',['getWaterPrice'])
    },
    mounted() {
        this.actPrice()
    }
}
</script>
<style scoped lang="scss">
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
    height: 250px;
    width: 400px;
    background: #98dfb6;
}
</style>
