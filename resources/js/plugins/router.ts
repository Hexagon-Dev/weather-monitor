import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';

const routes: Array<RouteRecordRaw> = [
    {
        path: '/',
        name: 'Index',
        component: () => import('@/pages/IndexPage.vue'),
        meta: {
            title: 'Subreddit Analysis',
        },
    },
    {
        path: '/:pathMatch(.*)*',
        redirect() {
            return '/';
        },
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior() {
        setTimeout(() => {
            document.body.scrollTo(0, 0);
        }, 100);
    },
});

router.beforeEach((to, from, next) => {
    document.title = to.meta.title + ' | Weather Monitor';
    next();
});

export default router;
