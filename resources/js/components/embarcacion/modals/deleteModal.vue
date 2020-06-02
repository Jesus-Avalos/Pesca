<template>
    <div class="modal fade" id="deleteModalEquipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="checkbox" id="deleteTeam" v-model="deleteTeam">
                    <label for="deleteTeam">Eliminar el equipo de la base de datos</label>
                    <br>
                    <input type="checkbox" id="deletePeople" v-model="deletePeople" :disabled="!deleteTeam">
                    <label for="deletePeople">Eliminar las personas de la base de datos</label>
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
            deleteTeam: false,
            deletePeople: false
        }
    },
    methods: {
        deleteItem() {
            let url = 'http://pesca.test/api/equipo/delete';
            const form = {
                deleteTeam : this.deleteTeam,
                deletePeople : this.deletePeople,
                pivot_id: this.pivot_id
            };
            
            axios.post(url,form)
                .then(res => {
                    $('#deleteModalEquipo').modal('toggle');
                    this.$emit('deleteItem');
                })
        }
    }
}
</script>

<style>

</style>