require("./bootstrap")
import { createApp } from "vue"
import App from "./src/index.vue"
import router from "./src/routes/routes"

import VueSweetalert2 from "vue-sweetalert2"
import "sweetalert2/dist/sweetalert2.min.css"

import store from "./store"
const app = createApp(App)
app.provide("store", store())

app.use(VueSweetalert2)
app.use(router)
window.Swal = app.config.globalProperties.$swal

// app.component('home-component',require('./components/Test/Test.vue').default)
app.mount("#app")
