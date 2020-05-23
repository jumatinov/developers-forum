<template>
    <div class="headernav">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="/"><img src="images/logo.jpg" alt=""  /></a></div>
                <div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">
                    <div class="dropdown">
                        <a data-toggle="dropdown" href="/" >Форум Разработчиков</a> <b class="caret"></b>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Borderlands 1</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-2" href="#">Borderlands 2</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-3" href="#">Borderlands 3</a></li>

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
                        <a class="btn btn-primary" href="/new-question">Создать вопрос</a>
                    </div>
                    <div class="env pull-left"><i class="fa fa-envelope"></i></div>

                    <div class="avatar pull-left dropdown">
                        <a data-toggle="dropdown" href="#">
                            <img src="https://visualpharm.com/assets/30/User-595b40b85ba036ed117da56f.svg" height="30" alt="" /></a> <b class="caret"></b>
                        <div class="status green">&nbsp;</div>
                        <ul class="dropdown-menu" role="menu" v-if="isLoggedIn() || stateIsLogged">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="/profile">Мой профиль</a></li>
<!--                            <li role="presentation"><a role="menuitem" tabindex="-2" href="#">Inbox</a></li>-->
                            <li role="presentation"><a role="menuitem" tabindex="-2" href="#" @click="logOut()">Выйти с профиля</a></li>
<!--                            <li role="presentation"><a role="menuitem" tabindex="-4" href="04_new_account.html">Create account</a></li>-->
                        </ul>
                        <ul class="dropdown-menu" role="menu" v-else>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="/login">Войти</a></li>
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
                document.location = '/?searchText=' + this.text;
            }
        }
    }
</script>