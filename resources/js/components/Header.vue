<template>
    <div class="headernav">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="/"><img src="/images/logo.jpg" alt=""  /></a></div>
                <div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">
                    <div class="dropdown">
                        <a data-toggle="dropdown" href="#" >Форум Разработчиков</a> <b class="caret"></b>
                        <ul class="dropdown-menu" style="margin-top:10px;" role="menu">
                            <li role="presentation"><router-link role="menuitem" tabindex="-1" to="/">Главная</router-link></li>
                            <li role="presentation"><router-link role="menuitem" tabindex="-1" to="/">О нас</router-link></li>
                            <li role="presentation"><router-link role="menuitem" tabindex="-1" to="/">Шаблоны</router-link></li>
                            <li role="presentation"><router-link role="menuitem" tabindex="-1" to="/">Услуги</router-link></li>
                            <li role="presentation"><router-link role="menuitem" tabindex="-2" to="/">Оставить заявку на создание сайта</router-link></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 search hidden-xs hidden-sm col-md-3">
                    <div class="wrap">
                        <div class="form">
                            <div class="pull-left txt"><input type="text" class="form-control" v-model="text" placeholder="Поиск..."></div>
                            <div class="pull-right"><button class="btn btn-default" type="button" @click="searchQuestions"><i class="fa fa-search"></i></button></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">
                    <div class="stnt pull-left">
                        <a class="btn btn-primary" href="/app/new-question">Создать вопрос</a>
                    </div>
                    <div class="env pull-left"><i class="fa fa-envelope"></i></div>

                    <div class="avatar pull-left dropdown">
                        <a data-toggle="dropdown" href="#">
                            <img :src="getMe() ?
                             getMe().email.indexOf('super') > -1 ?
                             '/images/female.jpg' : '/images/male.png' :
                              'https://visualpharm.com/assets/30/User-595b40b85ba036ed117da56f.svg'" height="30" width="30" alt="" />
                        </a> <b class="caret"></b>
                        <div class="status green">&nbsp;</div>
                        <ul class="dropdown-menu" role="menu" v-if="isLoggedIn() || stateIsLogged">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="/app/profile">Мой профиль</a></li>
<!--                            <li role="presentation"><a role="menuitem" tabindex="-2" href="#">Inbox</a></li>-->
                            <li role="presentation"><a role="menuitem" tabindex="-2" href="#" @click="logOut()">Выйти с профиля</a></li>
<!--                            <li role="presentation"><a role="menuitem" tabindex="-4" href="04_new_account.html">Create account</a></li>-->
                        </ul>
                        <ul class="dropdown-menu" role="menu" v-else>

                            <li role="presentation"><a role="menuitem" tabindex="-1" href="/app/login">Войти</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="/app/signup">Зарегистрироваться</a></li>

<!--                            <li role="presentation"><a role="menuitem" tabindex="-2" href="#">Зарегистрироваться</a></li>-->
                        </ul>

                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    import {mapState} from 'vuex';
    import router from '../router';
    export default {
        name: 'AppHeader',
        data() {
            return {
                text: '',
            }
        },
        mounted() {
            console.log('Header mounted');
        },
        computed: {
            ...mapState({
                stateIsLogged: state => state.stateIsLogged,
            })
        },
        methods: {
            searchQuestions() {
                document.location = '/app/?searchText=' + this.text;
            }
        }
    }
</script>