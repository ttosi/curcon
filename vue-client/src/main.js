import Vue from "vue"
import App from "./App.vue"
import router from "./router"
import store from "./store"
import directives from "./directives"
import filters from "./filters"
import vuetify from "./plugins/vuetify"
import Sugar from "sugar-date"

Sugar.extend()

Vue.config.productionTip = false

new Vue({
  router,
  store,
  vuetify,
  render: (h) => h(App)
}).$mount("#app")
