require('./bootstrap');
window.Vue = require('vue');

Vue.component('search-bar', require('./components/SearchBar.vue').default);

const app = new Vue({
    el: '#app',
});