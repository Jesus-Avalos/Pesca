<template>
    <div class="modal fade" id="createModalOrilla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear participante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formCreateOrilla" @submit.prevent="addNew">
                        <div class="form-group">
                            <label>Nombre*</label>
                            <input type="text" v-model="form.name" class="form-control" placeholder="Ingresa el nombre del participante..." required>
                        </div>
                        <div class="form-group">
                            <label>Ciudad*</label>
                            <input type="text" v-model="form.ciudad" class="form-control" placeholder="Ingresa el nombre de la ciudad..." required>
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" v-model="form.telefono" class="form-control" placeholder="Ingresa un teléfono válido...">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" v-model="form.email" class="form-control" placeholder="Ingresa un email válido...">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" form="formCreateOrilla" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['torneo_id'],
    data() {
        return {
            form: {
                name: '',
                ciudad: '',
                telefono: '',
                email: '',
                torneo_id: parseInt(this.torneo_id)
            }
        }
    },
    methods: {
        addNew() {
            let url = 'http://pesca.test/api/orilla';
            axios.post(url, this.form)
                .then(res => {
                    this.form.name = '';
                    this.form.ciudad = '';
                    this.form.telefono = '';
                    this.form.email = '';
                    console.log(res.data);
                    
                    $('#createModalOrilla').modal('toggle');
                    this.$emit('addNew',res.data[0]);
                })
        }
    }
}
</script>

<style>

</style>