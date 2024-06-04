import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';
import { useUserStore } from '@/stores/userStore';

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'index',
    component: () => import('@/pages/IndexPage.vue'),
    meta: {
      title: 'Home',
    },
  },
  {
    path: '/forecast/:slug',
    name: 'forecast',
    component: () => import('@/pages/ForecastPage.vue'),
    meta: {
      title: 'Home',
    },
  },
  {
    path: '/register',
    name: 'register',
    component: () => import('@/pages/RegisterPage.vue'),
    meta: {
      title: 'Register',
    },
  },
  {
    path: '/login',
    name: 'login',
    component: () => import('@/pages/LoginPage.vue'),
    meta: {
      title: 'Login',
    },
  },
  {
    path: '/profile',
    name: 'profile',
    component: () => import('@/pages/ProfilePage.vue'),
    meta: {
      title: 'Profile',
      requiresAuth: true,
    },
  },
  {
    path: '/logout',
    name: 'logout',
    component: () => import('@/pages/LogoutPage.vue'),
    meta: {
      title: 'Logout',
      requiresAuth: true,
    },
  },
  {
    path: '/verify-email',
    name: 'verify-email',
    component: () => import('@/pages/VerifyEmailPage.vue'),
    meta: {
      title: 'Verifying Email',
      hideNavigation: true,
    },
  },
  {
    path: '/forgot-password',
    name: 'forgot-password',
    component: () => import('@/pages/ForgotPasswordPage.vue'),
    meta: {
      title: 'Forgot Password',
    },
  },
  {
    path: '/reset-password',
    name: 'reset-password',
    component: () => import('@/pages/ResetPasswordPage.vue'),
    meta: {
      title: 'Reset Password',
      hideNavigation: true,
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

  if (to.meta.requiresAuth && !useUserStore().isAuthenticated) {
    next({ name: 'login' });
    return;
  }

  next();
});

export default router;
