import Vue from 'vue';
import router from './router';

Vue.mixin({
    methods: {
        isLoggedIn() {
            return !!localStorage.getItem('api_token') && !!localStorage.getItem('user');
        },
        logOut() {
            localStorage.removeItem('user');
            localStorage.removeItem('api_token');
            this.$store.commit('updateStateIsLogged', false);
            document.location = '/app';
        },
        saveToken(token) {
            localStorage.setItem('api_token', token);
        },
        saveMe(user) {
            localStorage.setItem('user', JSON.stringify(user));
        },
        getMe() {
            return JSON.parse(localStorage.getItem('user'));
        },
    }
})