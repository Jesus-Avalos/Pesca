<template>
    <div>
        <v-btn color="primary" :title="datosO.name" fab large dark @click="dialog = true" >
            <v-icon>fas fa-user</v-icon>
            <p>{{ index }}</p>
        </v-btn>
        
        <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
            <v-card>
                <v-toolbar dark color="primary">
                    <v-btn icon dark @click="dialog = false">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                    <v-toolbar-title>Bloques {{ datosO.name }}</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-toolbar-items>
                        <v-btn text @click="dialogGolon = true">Golón</v-btn>
                        <v-btn text type="submit" :form='"orillaForm"+datosO.id'>Registrar</v-btn>
                    </v-toolbar-items>
                </v-toolbar>

                <div class="m-5">
                    <div class="alert bg-success text-white" :id='"alertSuccess"+datosO.id' style="display: none">
                        Registrado correctamente
                    </div>
                    <v-dialog v-model="dialogGolon" persistent width="500">
                        <v-card>
                           <v-card-title class="headline">Registro de golón</v-card-title>
                           <form @submit.prevent="saveGolon" :id='"golonOrilla"+datosO.id'>
                              <div align="center" class="form-group">
                                 <label>Peso de la especie</label>
                                 <input type="text" class="form-control w-50 text-center" v-model.number="golon" required>
                              </div>
                              <v-card-actions>
                              <v-spacer></v-spacer>
                              <v-btn color="blue-grey darken-2" class="white--text" rounded @click="dialogGolon = false">Cancelar</v-btn>
                              <v-btn color="green darken-1" :form='"golonOrilla"+datosO.id' class="white--text" rounded type="submit">Registrar</v-btn>
                              </v-card-actions>
                           </form>
                        </v-card>
                    </v-dialog>
                    <form :id='"orillaForm"+datosO.id' @submit.prevent="saveData">
                        <div v-for="(n, i) in bloques" :key="i">
                            <H1 class="mt-2">Bloque {{ i+1 }}</H1>
                            <div class="row">
                                <div class="col-sm" v-for="(num,index) in n" :key="index">
                                    <div class="from-group">
                                        <label>Especie {{ index+1 }}: </label>
                                        <input type="text" :name='"bloque" + (i+1)' v-model.number="bloques[i][index]" class="form-control text-center" step="any" required> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="from-group float-right mt-4">
                            <label for="TotaEquipo">Total participante: </label>
                            <input type="text" v-model="total" class="form-control text-center" readonly>
                        </div>
                    </form>
                </div>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
export default {
   props: ['torneo_id','datos','index'],
   data() {
      return {
         datosO: JSON.parse(this.datos),
         bloques: [],
         dialog: false,
         dialogGolon: false,
         golon: 0,
      }
   },
   created() {
      this.bloques.push(JSON.parse(this.datosO.pivot.bloque1));
      this.bloques.push(JSON.parse(this.datosO.pivot.bloque2));
      this.bloques.push(JSON.parse(this.datosO.pivot.bloque3));        
   },
   computed : {
      total() {
         var suma = 0;
         this.bloques.forEach(element => {
            element.forEach(res => suma+=res );
         });
         return suma;
      }
   },
   methods: {
      saveData() {
         const params = {
            bloques: this.bloques,
            total: this.total
         }
         
         const url = 'http://pesca.test/api/orilla/' + this.datosO.pivot.id;

         axios.put(url,params)
            .then(res => {
                $("#alertSuccess"+this.datosO.id).html(res.data);
               $("#alertSuccess"+this.datosO.id).fadeToggle(2000);
               $("#alertSuccess"+this.datosO.id).fadeToggle(2000);
            })            
      },
      saveGolon() {
          const params = {
              golon: this.golon,
              persona_id: this.datosO.id,
              torneo_id: this.torneo_id
          }
          axios.post('golon', params)
            .then(res => {
                $("#alertSuccess"+this.datosO.id).html(res.data);
               $("#alertSuccess"+this.datosO.id).fadeToggle(2000);
               $("#alertSuccess"+this.datosO.id).fadeToggle(2000);
               this.dialogGolon = false;
            });
      }
   }
}
</script>

<style>

</style>