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
    }
})