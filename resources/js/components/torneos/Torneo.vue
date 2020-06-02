<template>
    <div>
        <ModalCreate @addNew="addNew" />
        <div class="text-center">
            <button class="btn btn-lg btn-primary" data-target="#createModal" data-toggle="modal">Crear torneo</button>
        </div>

        <table class="table table-bordered mt-3 text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre Torneo</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th><i class="fas fa-wrench"></i></th>
                </tr>
            </thead>
            <tbody>
                <template v-if="listTorneos.length">
                    <tr v-for="torneo in listTorneos" :key="torneo.id">
                        <td>{{ torneo.name }}</td>
                        <td>{{ torneo.tipo }}</td>
                        <td>{{ torneo.status }}</td>
                        <td>
                            <a :href='"/torneo/"+torneo.id' class="btn btn-sm btn-success" v-if="torneo.status != 'Terminado'"><i class="fas fa-arrow-circle-right"></i></a>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </template>
                <template v-else>
                    <tr>
                        <td colspan="4" class="text-center">Sin registros</td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
    import ModalCreate from './Modals/ModalCreate'
    export default {
        props: ['torneos'],
        data() {
            return {
                listTorneos: JSON.parse(this.torneos)
            }
        },
        methods: {
            addNew(item) {
                this.listTorneos.push(item);
            }
        },
        components: {
            ModalCreate
        }
    }
</script>

<style>

</style>