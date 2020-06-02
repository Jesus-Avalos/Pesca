<template>
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formCreate" @submit.prevent="addNew">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" v-model="form.name" class="form-control" placeholder="Ingresa el nombre del torneo..." required>
                        </div>
                        <div class="form-group">
                            <label>Tipo</label>
                            <select v-model="form.tipo" class="form-control" required>
                                <option value="">Selecciona una opcion...</option>
                                <option value="Orilla">Orilla</option>
                                <option value="Embarcacion">Embarcación</option>
                                <option value="Both">Orilla/Embarcación</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" form="formCreate" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: '',
                tipo: '',
                status: 'Activo'
            }
        }
    },
    methods: {
        addNew() {
            let url = 'http://pesca.test/api/torneo';
            axios.post(url, this.form)
                .then(res => {
                    $('#createModal').modal('toggle');
                    this.$emit('addNew',res.data);
                })
        }
    }
}
</script>

<style>

</style>