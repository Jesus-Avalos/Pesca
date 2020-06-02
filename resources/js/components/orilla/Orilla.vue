<template>
    <div>
        <ModalCreate 
            @addNew='listOrilla.push($event)' 
            :torneo_id='torneo_id'/>
        <ModalDelete 
            @deleteItem='listOrilla.splice(indexDelete,1)' 
            :pivot_id='pivot_id'/>
        <div class="text-center">
            <button class="btn btn-lg btn-primary" data-target="#createModalOrilla" data-toggle="modal">Crear participante</button>
        </div>

        <table class="table table-bordered mt-3 text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th><i class="fas fa-wrench"></i></th>
                </tr>
            </thead>
            <tbody>
                <template v-if="listOrilla.length">
                    <tr v-for="(orilla,index) in listOrilla" :key="index">
                        <td>{{ orilla.name }}</td>
                        <td>{{ orilla.ciudad }}</td>
                        <td>
                            <button class="btn btn-sm btn-danger" @click="pivot_id=orilla.pivot.id; indexDelete = index;" data-toggle="modal" data-target="#deleteModalOrilla"><i class="fas fa-trash"></i></button>
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
            listOrilla: JSON.parse(this.datos),
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