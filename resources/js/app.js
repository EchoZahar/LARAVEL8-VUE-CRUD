require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from "vue-router";
Vue.use(VueRouter);

import Categories from './components/Categories/Categories';
import Posts from './components/Posts/Posts';
// Vue.component('posts', require('./components/Posts/Posts'));

const router = new VueRouter({
    mode: 'history',
    //routes: require('./routes.js')
    routes: [
        {
            path: '/categories',
            name: 'categories.index',
            component: Categories
        },
        {
            path: '/posts',
            name: 'posts.index',
            component: Posts
        }
    ],
});

const app = new Vue({
    router,
    el: '#app',
});
