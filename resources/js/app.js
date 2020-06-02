require('./bootstrap');

window.Vue = require('vue');
import Vuetify from 'vuetify';
Vue.use(Vuetify);

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('torneo-component', require('./components/torneos/Torneo.vue').default);
Vue.component('orilla-component', require('./components/orilla/Orilla.vue').default);
Vue.component('orilla-start', require('./components/torneos/start/OrillaStart.vue').default);
Vue.component('equipo-start', require('./components/torneos/start/EquipoStart.vue').default);
Vue.component('embarcacion-component', require('./components/embarcacion/Embarcacion.vue').default);
Vue.component('parts-component', require('./components/torneos/start/Parts.vue').default);

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify({
        theme: { disable: true },
    }),
});
