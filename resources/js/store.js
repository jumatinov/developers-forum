import Vue from 'vue';
import Vuex from 'vuex';
import {get, post, put, remove} from "./helpers/http";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        currentUser: null,
        tags: [],
        questions: [],
        questionsPagination: [],
        stateIsLogged: false,
    },
    actions: {
        login(context, data) {
            return post('/api/login', data);
        },
        getMe(context, data) {
            return get('/api/user').then((response) => {
                context.commit('updateCurrentUser', response.data);
                return response;
            })
        },
        getTags(context, data) {
            return get('/api/tags').then((response) => {
                context.commit('updateTags', response.data.data);
            })
        },
        getQuestions(context, page = 1) {
            return get(`/api/questions?page=${page}`).then((response) => {
                context.commit('updateQuestions', response.data.data);
                context.commit('updateQuestionsPagination', response.data.meta);
                return response;
            })
        },
        saveQuestion(context, data) {
            return post('/api/questions', data);
        },
        getQuestionsByTag(context, id) {
            return get(`/api/questions-by-tags/${id}`)
                .then((response) => {
                    context.commit('updateQuestions', response.data.data);
                    return response;
                });
        },
        getQuestion(context, id) {
            return get(`/api/questions/${id}`);
        },
        saveAnswer(context, answer) {
            return post('/api/answers', answer);
        },
        getUserQuestions(context) {
            return get('/api/user/questions');
        },
    },
    mutations: {
        updateCurrentUser(state, user) {
            state.currentUser = user;
        },
        updateTags(state, tags) {
            state.tags = tags;
        },
        updateQuestionsPagination(state, pagination) {
            state.questionsPagination = pagination;
        },
        updateQuestions(state, questions) {
            state.questions = questions;
        },
        updateMe(state, me) {
            state.currentUser = me;
        },
        updateStateIsLogged(state, stateIsLogged) {
            state.stateIsLogged = stateIsLogged;
        }
    },
    getters: {
        currentUser(state) {
            return state.currentUser;
        },
        tags(state) {
            return state.tags;
        },
        questionsPagination(state) {
            return state.questionsPagination;
        },
        questions(state) {
            return state.questions;
        },
        stateIsLogged(state) {
            return state.stateIsLogged
        },
    },
});

export default store;