require("./bootstrap");

window.Vue = require("vue");

Vue.config.productionTip = false;

Vue.component("home-component", require("./components/Home.vue").default);
Vue.component("property", require("./components/SingleProperty.vue").default);

const app = new Vue({
    el: "#app"
});
