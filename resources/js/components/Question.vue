<template>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 breadcrumbf">
                    <a href="#">Форум разработчиков</a> <span class="diviver">&gt;</span>
                    <a href="#">{{ !!question.tag ? question.tag.name : '' }}</a> <span class="diviver">&gt;</span>
                    <a href="#">Детали вопроса</a>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">

                    <!-- POST -->
                    <div class="post beforepagination">
                        <div class="topwrap">
                            <div class="userinfo pull-left">
                                <div class="avatar">
                                    <img src="images/avatar.jpg" alt="" />
                                    <div class="status green">&nbsp;</div>
                                </div>

                                <div class="icons">
                                    <img src="images/icon1.jpg" alt="" /><img src="images/icon4.jpg" alt="" /><img src="images/icon5.jpg" alt="" /><img src="images/icon6.jpg" alt="" />
                                </div>
                            </div>
                            <div class="posttext pull-left">
                                <h2>{{ question.title }}</h2>
                                <p>{{ question.question }}</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="postinfobot">

                            <div class="likeblock pull-left">
                                <a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>25</a>
                                <a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>3</a>
                            </div>

                            <div class="prev pull-left">
                                <a href="#"><i class="fa fa-reply"></i></a>
                            </div>

                            <div class="posted pull-left"><i class="fa fa-clock-o"></i> Был опубликован : {{ moment(question.created_at).fromNow() }}</div>

                            <div class="next pull-right">
                                <a href="#"><i class="fa fa-share"></i></a>

                                <a href="#"><i class="fa fa-flag"></i></a>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div><!-- POST -->


                    <!-- POST -->
                    <h4 style="margin-bottom: 30px;">Ответы: </h4>
                    <div class="post" v-for="answer in question.answers">
                        <div class="topwrap">
                            <div class="userinfo pull-left">
                                <div class="avatar">
                                    <img src="images/avatar2.jpg" alt="" />
                                    <div class="status red">&nbsp;</div>
                                </div>

                                <div class="icons">
                                    <img src="images/icon3.jpg" alt="" /><img src="images/icon4.jpg" alt="" /><img src="images/icon5.jpg" alt="" /><img src="images/icon6.jpg" alt="" />
                                </div>
                            </div>
                            <div class="posttext pull-left">
                                <p>{{ answer.answer }}</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="postinfobot">

                            <div class="likeblock pull-left">
                                <a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>10</a>
                                <a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>1</a>
                            </div>

                            <div class="prev pull-left">
                                <a href="#"><i class="fa fa-reply"></i></a>
                            </div>

                            <div class="posted pull-left"><i class="fa fa-clock-o"></i> Ответ опубликован : {{ moment(answer.created_at).fromNow() }}</div>

                            <div class="next pull-right">
                                <a href="#"><i class="fa fa-share"></i></a>

                                <a href="#"><i class="fa fa-flag"></i></a>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div><!-- POST -->

                    <div class="post">
                        <div class="form">
                            <div class="topwrap">
                                <div class="userinfo pull-left">
                                    <div class="avatar">
                                        <img src="images/avatar4.jpg" alt="" />
                                        <div class="status red">&nbsp;</div>
                                    </div>

                                    <div class="icons">
                                        <img src="images/icon3.jpg" alt="" /><img src="images/icon4.jpg" alt="" /><img src="images/icon5.jpg" alt="" /><img src="images/icon6.jpg" alt="" />
                                    </div>
                                </div>
                                <div class="posttext pull-left">
                                    <div class="textwraper">
                                        <textarea name="reply" id="reply" v-model="answer" placeholder="Введите свой ответ"></textarea>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="postinfobot">


                                <div class="pull-right postreply">
                                    <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                    <div class="pull-left"><button @click="saveAnswer" class="btn btn-primary">Опубликовать ответ</button></div>
                                    <div class="clearfix"></div>
                                </div>


                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div><!-- POST -->




                </div>
                <AppSidebar></AppSidebar>
            </div>
        </div>


    </section>

</template>
<script>
    import AppSidebar from "./AppSidebar";
    import moment from 'moment';
    import router from '../router';
    export default {
        name: 'Question',
        components: {AppSidebar},
        data() {
            return {
                question: {
                    answers: []
                },
                answer: null,
                moment
            }
        },
        created() {
            this.getQuestion();
        },
        methods: {
            saveAnswer() {
                if (this.isLoggedIn()) {
                    showLoader();
                    this.$store.dispatch('saveAnswer', {
                        answer: this.answer,
                        question_id: this.question.id,
                        user_id: this.getMe().id,
                    })
                        .then(() => {
                            this.answer = null;
                            this.getQuestion();
                            hideLoader();
                        });
                } else {
                    router.push('/login');
                }
            },
            getQuestion() {
                this.$store.dispatch('getQuestion', this.$route.params.id).then((response) => {
                    this.question = response.data.data;
                });
            },
        }
    }
</script>