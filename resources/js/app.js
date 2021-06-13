/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

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
Vue.component('user-dashboard', require('./components/UserDashboard.vue').default);

/* running app component declear */
Vue.component('detail-ranking', require('./components/DetailRaking.vue').default);
Vue.component('detail-ranking-item', require('./components/DetailRakingItem.vue').default);
Vue.component('run-dashboard', require('./components/RunDashboard.vue').default);
Vue.component('individual-ranking', require('./components/IndividualRanking.vue').default);
Vue.component('individual-ranking-item', require('./components/IndividualRankingItem.vue').default);
Vue.component('team-ranking', require('./components/TeamRank.vue').default);
Vue.component('team-rank-item', require('./components/TeamRankItem.vue').default);
Vue.component('spinner', require('./components/Spinner.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
