import Vue from 'vue';

Vue.mixin({
    methods: {
        isLoggedIn() {
            return !!localStorage.getItem('api_token') && !!localStorage.getItem('user');
        },
        logOut() {
            localStorage.removeItem('user');
            localStorage.removeItem('api_token');
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