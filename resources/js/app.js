/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

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
Vue.component('dashboard-medecin', require('./components/MedecinComponents/DashboardMedecinComponent.vue').default);
Vue.component('top-nav-medecin', require('./components/MedecinComponents/TopNavbarMedecinComponent.vue').default);
Vue.component('footer-medecin', require('./components/MedecinComponents/FooterMedecinComponent.vue').default);
Vue.component('side-nav-medecin', require('./components/MedecinComponents/SideBarMedecinComponent.vue').default);
Vue.component('ajouter-medecin', require('./components/MaladeComponents/AjouterMaladeComponent.vue').default);
Vue.component('historique-malade', require('./components/MedecinComponents/HisotriqueMaladesComponent.vue').default);
Vue.component('malade-profile', require('./components/MaladeComponents/MaladeProfileComponent.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Swal from 'sweetalert2';
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})


const app = new Vue({
    el: '#app',
});
