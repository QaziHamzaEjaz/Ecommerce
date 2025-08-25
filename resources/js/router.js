import { createRouter, createWebHistory } from 'vue-router';
import { usePage } from '@inertiajs/vue3';
// import route from 'ziggy-js';
import Blogs from './Pages/Blogs.vue';
import Admin from './Pages/Admin.vue';
import AdminUsers from './Pages/Admin/users.vue';

const routes = [
    { path: '/blogs', component: Blogs },
    { path: '/admin', component: Admin, meta: { requiresAuth: true, type: 'Admin' } },
    { path: '/admin/users', component: AdminUsers },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

// Redirect users based on type
router.beforeEach((to, from, next) => {
    const page = usePage();
    const user = page.props.auth?.user;

    if (to.meta.requiresAuth && user) {
        if (to.meta.type && user.type !== to.meta.type) {
            return next(route(user.type === 'Admin' ? 'admin' : 'user')); // ✅ Use Ziggy routes
        }
    }

    next();
});

export default router;
