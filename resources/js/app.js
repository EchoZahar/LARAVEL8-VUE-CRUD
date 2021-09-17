require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from "vue-router";
Vue.use(VueRouter);

import Categories from './components/Categgories/Categories';
import Posts from './components/Posts/Posts'

const router = new VueRouter({
    mode: 'history',
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

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);



const app = new Vue({
    router,
    el: '#app',
});
