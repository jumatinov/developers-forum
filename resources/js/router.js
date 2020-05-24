import Vue from 'vue';
import VueRouter from 'vue-router';
import Profile from './components/Profile';
import Login from "./components/Login";
import Forum from './components/Forum';
import Main from "./components/Main";
import Question from "./components/Question";
import NewQuestion from "./components/NewQuestion";
import Signup from "./components/Signup";
import CreateProfile from "./components/CreateProfile";
import AboutUs from "./components/AboutUs";
import SiteRequest from "./components/SiteRequest"
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
            path: '/app/profile',
            component: Profile,
        },
        {
            path: '/app',
            component: Forum,
        },
        {
            path: '/app/new-question',
            component: NewQuestion,
        },
        {
            path: '/app/question/:id',
            component: Question,
        },
        {
            path: '/app/login',
            component: Login,
        },
        {
            path: '/app/signup',
            component: Signup,
        },
        {
            path: '/app/create',
            component: CreateProfile,
        },
        {
            path: '/app/about-us',
            component: AboutUs,
        },
        {
            path: '/app/site-request',
            component: SiteRequest,
        }
    ],
});

function isLogged() {
    return !!localStorage.getItem('api_token') && !!localStorage.getItem('user');
}

function isNeedToLogged(path) {
    return path.indexOf('new-question') > -1 || path.indexOf('profile') > -1;
}

function isNeedToNotLogged(path) {
    return path.indexOf('login') > - 1 || path.indexOf('signup') > -1;
}

router.beforeEach((to, from, next) => {
    const { path } = to;
    document.title = to.meta.title || 'Developer Forum';
    if (isNeedToLogged(path)) {
        if (isLogged()) {
            next();
        } else {
            document.location = '/app/login';
        }
    } else {
        if (isLogged() && isNeedToNotLogged(path)) {
            document.location = '/app';
        }
        next();
    }
});

export default router;
