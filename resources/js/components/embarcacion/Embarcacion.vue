<template>
    <div>
        <ModalCreate 
            @addNew='listEmbarcacion.push($event)' 
            :torneo_id='torneo_id'/>
        <ModalDelete 
            @deleteItem='listEmbarcacion.splice(indexDelete,1)' 
            :pivot_id='pivot_id'/>
        <div class="text-center">
            <button class="btn btn-lg btn-primary" data-target="#createModalEquipo" data-toggle="modal">Crear equipo</button>
        </div>

        <table class="table table-bordered mt-3 text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Integrantes</th>
                    <th><i class="fas fa-wrench"></i></th>
                </tr>
            </thead>
            <tbody>
                <template v-if="listEmbarcacion.length">
                    <tr v-for="(equipo,index) in listEmbarcacion" :key="index">
                        <td>{{ equipo.name }}</td>
                        <td>{{ equipo.integrantes }}</td>
                        <td>
                            <button class="btn btn-sm btn-danger" @click="pivot_id=equipo.pivot.id; indexDelete = index;" data-toggle="modal" data-target="#deleteModalEquipo"><i class="fas fa-trash"></i></button>
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
import ModalCreate from './modals/createModal'
import ModalDelete from './modals/deleteModal'
export default {
    props: ['datos','torneo_id'],
    data() {
        return {
            listEmbarcacion: JSON.parse(this.datos),
            pivot_id: 0,
            indexDelete: 0
        }
    },
    components: {
        ModalCreate,
        ModalDelete
    }
}
</script>

<style>

</style>