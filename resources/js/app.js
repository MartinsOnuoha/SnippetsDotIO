
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('Friend', require('./components/Friend.vue'));
Vue.component('Cancel', require('./components/Cancel.vue'));
Vue.component('Like', require('./components/Like.vue'));
Vue.component('Interest', require('./components/Interest.vue'));

const app = new Vue({
    el: '#app'
});

