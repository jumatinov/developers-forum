import Vue from 'vue';
import Vuex from 'vuex';
import {get, post, put, remove} from "./helpers/http";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        currentUser: null,
    },
    actions: {
        login(context, data) {
            return post('/api/login', data).then((response) => {
                localStorage.setItem('token', response.data.api_token);
            });
        },
        getUser(context, data) {
            return get('/api/me').then((response) => {
                context.commit('updateCurrentUser', response.data);
            })
        },
    },
    mutations: {
        updateCurrentUser(state, user) {
            state.currentUser = user;
        }
    },
    getters: {
        currentUser(state) {
            return state.user;
        },
    },
});

export default store;