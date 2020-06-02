<template>
    <v-card
        class="mx-auto"
        max-width="300"
        tile>
        <v-list disabled dense>
            <v-subheader>Participantes</v-subheader>
            <v-list-item-group color="primary" >
                <v-list-item v-for="(item, i) in listDatos" :key="i">
                    <v-list-item-icon>
                        {{ i + 1 }}
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title v-text="item.name"></v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list-item-group>
        </v-list>
    </v-card>
</template>

<script>
export default {
    props: ['datos'],
    data () {
        return {
            listDatos: JSON.parse(this.datos)
        }
    }
}
</script>

<style>

</style>