import Vue from 'vue';
import VueRouter from 'vue-router';
import Profile from './components/Profile';
import Login from "./components/Login";
import Main from './components/Main';
import Question from "./components/Question";
import NewQuestion from "./components/NewQuestion";
// import { newUserRedirectOnWelcome, expiredSessionRedirectOnAuth } from './helpers/checkStatus';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    base: __dirname,
    scrollBehavior() {
        return { x: 0, y: 0 };
    },
    routes: [
        {
            path: '/profile',
            component: Profile,
        },
        {
            path: '/',
            component: Main,
        },
        {
            path: '/new-question',
            component: NewQuestion,
        },
        {
            path: '/question',
            component: Question,
        },
        {
            path: '/login',
            component: Login,
        }
    ],
});

router.beforeEach((to, from, next) => {
    const { path } = to;
    document.title = to.meta.title || 'Developer Forum';

    next();
});

export default router;
