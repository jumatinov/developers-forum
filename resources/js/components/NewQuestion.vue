<template>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 breadcrumbf">
                    <a href="#">Borderlands 2</a> <span class="diviver">&gt;</span> <a href="#">General Discussion</a> <span class="diviver">&gt;</span> <a href="#">New Topic</a>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">



                    <!-- POST -->
                    <div class="post">
                        <div class="form newtopic" >
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

                                    <div>
                                        <input type="text" placeholder="Введите заголовок вопроса" v-model="question.title" class="form-control" />
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <select name="category" id="chooseTag"  class="form-control" @change="chooseTag">
                                                <option value="null" disabled selected>Выберите тэг</option>
                                                <option v-for="question in tags" :value="question.id" :key="question.id">{{ question.name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <textarea name="desc" id="desc" placeholder="Вопрос" v-model="question.question"  class="form-control" ></textarea>
                                    </div>
                                    <div>
                                        <span id="error">Заполните все данные</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="postinfobot">


                                <div class="pull-right postreply">
                                    <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                    <div class="pull-left"><button @click="saveQuestion" class="btn btn-primary">Задать</button></div>
                                    <div class="clearfix"></div>
                                </div>


                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div><!-- POST -->

                    <div class="row similarposts">
                        <div class="col-lg-10"><i class="fa fa-info-circle"></i> <p>Здесь отображаются последние вопросы по выбранной <a href="#">Категории</a>.</p></div>
                        <div class="col-lg-2 loading"><i class="fa fa-spinner"></i></div>

                    </div>

                    <!-- POST -->
                    <div class="post" v-for="question in questions">
                        <div class="wrap-ut pull-left">
                            <div class="userinfo pull-left">
                                <div class="avatar">
                                    <img src="images/avatar.jpg" alt="" />
                                    <div class="status green">&nbsp;</div>
                                </div>

                                <div class="icons">
                                    <img src="images/icon1.jpg" alt="" /><img src="images/icon4.jpg" alt="" />
                                </div>
                            </div>
                            <div class="posttext pull-left">
                                <h2>{{ question.title }}</h2>
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
                            <div class="views"><i class="fa fa-eye"></i> 1,568</div>
                            <div class="time"><i class="fa fa-clock-o"></i>{{ moment(question.created_at).fromNow() }}</div>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- POST -->





                </div>
                <AppSidebar></AppSidebar>
            </div>
        </div>
    </section>
</template>
<style>
    #error {
        color:red; font-size: 14px; margin-top:10px; display: none;
    }
</style>
<script>
    import AppSidebar from "./AppSidebar";
    import router from "../router";
    import moment from 'moment';
    import {mapState} from 'vuex';
    export default {
        name: 'NewQuestion',
        components: {AppSidebar},
        data() {
            return {
                question: {
                    title: '',
                    question: '',
                },
                moment,
            }
        },
        created() {
            this.$store.dispatch('getTags');
        },
        computed: {
            ...mapState({
                tags: state => state.tags,
                questions: state => state.questions,
            })
        },
        methods: {
            saveQuestion() {
                showLoader();
                console.log({
                    ...this.question,
                    user_id: this.getMe().id,
                })
                this.$store.dispatch('saveQuestion', {
                    ...this.question,
                    user_id: this.getMe().id,
                }).then(() => {
                    hideLoader();
                    router.push('/');
                }).catch(() => {
                    document.getElementById('error').style.display = 'inline';
                    hideLoader();
                });
            },
            chooseTag() {
                showLoader();
                const tagId = document.getElementById('chooseTag').value;
                this.question.tag_id = tagId;
                this.$store.dispatch('getQuestionsByTag', tagId).then(hideLoader);
            },
        }
    }
</script>