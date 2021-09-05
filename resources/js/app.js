import "@babel/polyfill"
require('./bootstrap')

import 'vuetify/dist/vuetify.min.css'
import '@mdi/font/css/materialdesignicons.css'
import VueDraggable from 'vuedraggable'


//Packages
import Vue from 'vue'
import vuetify from 'vuetify'
import Vuex from 'vuex'




Vue.use(Vuex)
Vue.use(vuetify)
Vue.use(VueDraggable);



Vue.config.devtools = false
Vue.config.productionTip = false

import { createInertiaApp } from '@inertiajs/inertia-vue' 

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, app, props }) {
        new Vue({
            render: h => h(app, props),
            vuetify: new vuetify(),
        }).$mount(el)
    },
})






