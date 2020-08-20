/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// https://www.youtube.com/watch?v=bV9YsIi-FUU&list=PLB4AdipoHpxaHDLIaMdtro1eXnQtl_UvE&index=16
// https://momentjs.com/
import moment from 'moment';////
Vue.filter('myDate',function(created){ //////////////
    // return moment(created).format('DD-MM-YYYY, H:mm:ss'); /////////////
    return moment(created).format('DD-MM-YYYY'); /////////////
}); //////////////

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('show-category', require('./components/admin/category/ShowCategory.vue').default);
Vue.component('show-carouselone', require('./components/admin/product/ShowCarouselone.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
