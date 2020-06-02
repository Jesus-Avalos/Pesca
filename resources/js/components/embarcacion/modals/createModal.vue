<template>
    <div class="modal fade" id="createModalEquipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear participante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="addNew" id="formCreateEquipo">
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">Nombre de equipo</label>
                            <div class="col-5">
                                <input type="text" class="form-control" v-model="name" required>
                            </div>
                            <button class="btn btn-secondary" title="Agregar Partner" type="button" @click="integrantes++" v-if="integrantes < 4">
                                <i class="fa fa-plus"></i> Partner
                            </button>
                        </div>
                        <p class="text-danger"><strong>Nota: </strong>Una vez creado no podra ser editado.</p>
                        <div class="row">
                            <div class="col-12 text-center">
                                <table style="width: 100%; color: white;" class="table table-bordered">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th width="30%">Nombre</th>
                                            <th width="25%">Ciudad</th>
                                            <th width="15%">Teléfono</th>
                                            <th width="30%">Email</th>
                                            <th><i class="fa fa-wrench"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody id="integrantes">
                                        <tr v-for="n in integrantes" :key="n">
                                            <td>
                                                <input v-model="form.name[n-1]" name="name[]" type="text" class="form-control" required>
                                            </td>
                                            <td>
                                                <input v-model="form.ciudad[n-1]" name="ciudad[]" type="text" class="form-control" required>
                                            </td>
                                            <td>
                                                <input v-model="form.telefono[n-1]" name="telefono[]" type="text" class="form-control">
                                            </td>
                                            <td>
                                                <input v-model="form.email[n-1]" name="email[]" type="email" class="form-control">
                                            </td>
                                            <td><button type="button" class="btn btn-danger btn-sm" v-if="n > 2" @click="deleteItem(index,n-1)"><i class="fas fa-trash"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" form="formCreateEquipo" class="btn btn-primary">Guardar</button>
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
            name: '',
            integrantes: 2,
            form: {
                name: [],
                ciudad: [],
                telefono: [],
                email: []
            }
        }
    },
    methods: {
        addNew() {
            const params = {
                equipo: this.name,
                integrantes: this.integrantes,
                torneo_id: this.torneo_id,
                names: this.form.name,
                cities: this.form.ciudad,
                phones: this.form.telefono,
                emails: this.form.email
            };
            
            let url = 'http://pesca.test/api/equipo';
            axios.post(url, params)
                .then(res => {
                    this.name = '',
                    this.integrantes = 2;
                    this.form.name = [];
                    this.form.ciudad = [];
                    this.form.telefono = [];
                    this.form.email = [];
                    $('#createModalEquipo').modal('toggle');
                    this.$emit('addNew',res.data[0]);
                })   
        },
        deleteItem(index,n) {
            this.form.name.splice(n,1);
            this.form.ciudad.splice(n,1);
            this.form.telefono.splice(n,1);
            this.form.email.splice(n,1);
            this.integrantes--;
        }
    }
}
</script>

<style>

</style>