<template>
    <div class="modal fade" id="deleteModalOrilla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar participante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="mb-3">¿Está seguro de eliminar?</h3>
                    <input type="checkbox" id="check" v-model="checked">
                    <label for="check">Eliminar la persona de la base de datos</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" @click="deleteItem">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['pivot_id'],
    data() {
        return {
            checked: false
        }
    },
    methods: {
        deleteItem() {
            let url = 'http://pesca.test/api/orilla/delete';
            const form = {
                checked : this.checked,
                pivot_id: this.pivot_id
            };
            
            axios.post(url,form)
                .then(res => {
                    $('#deleteModalOrilla').modal('toggle');
                    this.$emit('deleteItem');
                })
        }
    }
}
</script>

<style>

</style>