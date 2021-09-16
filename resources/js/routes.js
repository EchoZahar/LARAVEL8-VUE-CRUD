module.exports = [
    {
        path: '/categories',
        name: 'categories.index',
        component: () => import('./components/Categories/Categories')
    },
    {
        path: '/posts',
        name: 'posts.index',
        component: () => import('./components/Posts/Posts')
    }
]
