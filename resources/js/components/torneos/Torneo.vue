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
                        <td>
                            <span class="badge" 
                                :class="{'badge-success': torneo.status == 'Activo', 'badge-warning': torneo.status == 'En progreso','badge-danger': torneo.status == 'Terminado'}">
                                    {{ torneo.status }}
                            </span>
                        </td>
                        <td>
                            <a title="Resultados" :href='"/torneo/result/"+torneo.id' class="btn btn-sm btn-secondary" target="_blank"><i class="fas fa-bars"></i></a>
                            <a title="Ir al registro" :href='"/torneo/"+torneo.id' class="btn btn-sm btn-primary" v-if="torneo.status == 'Activo'"><i class="fas fa-edit"></i></a>
                            <a title="Continuar" :href='"/torneo/start/"+torneo.id' class="btn btn-sm btn-success" v-if="torneo.status == 'En progreso'"><i class="fas fa-arrow-circle-right"></i></a>
                            <button title="Eliminar" class="btn btn-sm btn-danger" v-if="torneo.status != 'En progreso'"><i class="fas fa-trash"></i></button>
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