
require('./bootstrap');

window.Vue = require('vue');
window.axios=require('axios');

var Lang = require('vue-lang');

var locales = {
    "en": require("./lang/en/site.js"),
    "fa": require("./lang/fa/site.js")
};

Vue.use(Lang, {lang: 'fa' ,locales: locales});

Vue.component('machine-component', require('./components/client/MachineComponent.vue').default);
Vue.component('aboutus-component', require('./components/client/AboutusComponent.vue').default);
Vue.component('contactus-component', require('./components/client/ContactusComponent.vue').default);
Vue.component('header-language', require('./components/client/LanguageComponent.vue').default);




Vue.component('error', require('./components/custom/error.vue').default);



const app = new Vue({
    el: '#client',
});





/* npms

npm install verte --save


*/
