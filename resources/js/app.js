require("./bootstrap");

window.Vue = require("vue");

import router from "./router/index";

Vue.config.productionTip = false;

Vue.component("home-component", require("./components/Home.vue").default);

const app = new Vue({
    el: "#app",
    router
});
