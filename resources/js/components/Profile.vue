<template>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 breadcrumbf">
                    <a href="#">Create New account</a>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">



                    <!-- POST -->
                    <div class="post">
                        <div action="#" class="form newtopic" method="post">


                            <!-- acc section -->
                            <div class="accsection">
                                <div class="acccap">
                                    <div class="userinfo pull-left">&nbsp;</div>
                                    <div class="posttext pull-left"><h3>Ваши данные</h3></div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img src="/images/avatar-blank.jpg" alt="" />
                                            <div class="status green">&nbsp;</div>
                                        </div>
                                        <div class="imgsize">60 x 60</div>
                                        <div>
                                            <button class="btn">Добавить</button>
                                        </div>
                                    </div>
                                    <div class="posttext pull-left" v-if="user">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <input type="text" v-model="user.name" placeholder="Имя" class="form-control" />
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="text" placeholder="Фамилия" v-model="user.surname" class="form-control" />
                                            </div>
                                        </div>
                                        <div>
                                            <input type="text" placeholder="username" v-model="user.username" class="form-control" />
                                        </div>
                                        <div>
                                            <input type="text" placeholder="email" v-model="user.email" class="form-control" />
                                        </div>
<!--                                        <div class="row">-->
<!--                                            <div class="col-lg-6 col-md-6">-->
<!--                                                <input type="password" placeholder="Password" class="form-control" id="pass" name="pass" />-->
<!--                                            </div>-->
<!--                                            <div class="col-lg-6 col-md-6">-->
<!--                                                <input type="password" placeholder="Retype Password" class="form-control" id="pass2" name="pass2" />-->
<!--                                            </div>-->
<!--                                        </div>-->

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div><!-- acc section END -->



                            <!-- acc section -->



                            <!-- acc section -->

                            <!-- acc section -->



                            <div class="postinfobot">


                                <div class="pull-right postreply">
                                    <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                    <div class="pull-left"><button class="btn btn-primary">Изменить</button></div>
                                    <div class="clearfix"></div>
                                </div>


                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div><!-- POST -->


                    <h5>Ваши вопросы: </h5>

                    <div class="post" v-for="question in questions">
                        <div class="wrap-ut pull-left">
                            <div class="userinfo pull-left">
                                <div class="avatar" :title="`${user.name} ${user.surname}`">
                                    <img src="/images/avatar.jpg" alt="" />
                                    <div class="status green">&nbsp;</div>
                                </div>

                                <div class="icons">
                                    <img src="/images/icon1.jpg" alt="" /><img src="/images/icon4.jpg" alt="" />
                                </div>
                            </div>
                            <div class="posttext pull-left">
                                <h2><router-link :to="`/app/question/${question.id}`">{{ question.title }}</router-link></h2>
                                <p>{{ question.question }}</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="postinfo pull-left">
                            <div class="comments">
                                <div class="commentbg">
                                    560
                                    <div class="mark"></div>
                                </div>

                            </div>
                            <div class="views"><i class="fa fa-eye"></i> {{ question.views || 0 }}</div>
                            <div class="time"><i class="fa fa-clock-o"></i> {{ moment(question.created_at).fromNow() }}</div>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- POST -->



                </div>
                <AppSidebar></AppSidebar>
            </div>
        </div>


    </section>
</template>
<script>
    import AppSidebar from "./AppSidebar";
    import {mapState} from 'vuex';
    import moment from 'moment';
    export default {
        name: 'Profile',
        components: {AppSidebar},
        data() {
            return {
                questions: [],
                moment
            }
        },
        computed: {
            ...mapState({
                user: state => state.currentUser,
            })
        },
        created() {
            this.$store.dispatch('getMe');
            this.$store.dispatch('getUserQuestions')
                .then((response) => {
                    this.questions = response.data;
                });
        },
    }
</script>