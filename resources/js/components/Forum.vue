<template>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xs-12 col-md-8">
                    <div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>
                    <div class="pull-left">
                        <ul class="paginationforum">
                            <li v-for="(page, index) in paginationDraw(pagination.current_page, pagination.last_page)">
                                <a href="javascript:void(0)"
                                   :class="page == pagination.current_page ? 'active' : ''"
                                   @click="changePage(page)" v-if="page !== '...'">{{ page }}</a>
                                <a href="javascript:void(0)" v-else>{{ page }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <!-- POST -->
                    <div class="post" v-for="question in questions">
                        <div class="wrap-ut pull-left">
                            <div class="userinfo pull-left">
                                <div class="avatar" :title="`${question.user.name} ${question.user.surname}`">
                                    <div :style="{backgroundImage: `url(${question.user.email.indexOf('super') > -1 ? 'images/female.jpg' : 'images/male.png'})`}"
                                         style="background-size: cover;height:40px;width:40px;background-position: center;border-radius:50%;"  />
                                    <div class="status green">&nbsp;</div>
                                </div>

                                <div class="icons">
                                    <img src="images/icon1.jpg" alt="" /><img src="images/icon4.jpg" alt="" />
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
                                    {{ question.answers_count }}
                                    <div class="mark"></div>
                                </div>

                            </div>
                            <div class="views"><i class="fa fa-eye"></i> {{ question.views }}</div>
                            <div class="time"><i class="fa fa-clock-o"></i> {{ moment(question.created_at).fromNow() }}</div>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- POST -->


<!--                    &lt;!&ndash; POST &ndash;&gt;-->
<!--                    <div class="post">-->
<!--                        <div class="wrap-ut pull-left">-->
<!--                            <div class="userinfo pull-left">-->
<!--                                <div class="avatar">-->
<!--                                    <img src="images/avatar2.jpg" alt="" />-->
<!--                                    <div class="status red">&nbsp;</div>-->
<!--                                </div>-->

<!--                                <div class="icons">-->
<!--                                    <img src="images/icon3.jpg" alt="" /><img src="images/icon4.jpg" alt="" /><img src="images/icon5.jpg" alt="" /><img src="images/icon6.jpg" alt="" />-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="posttext pull-left">-->
<!--                                <h2><a href="02_topic.html">What Instagram Ads Will Look Like</a></h2>-->
<!--                                <p>Instagram offered a first glimpse at what its ads will look like in a blog post Thursday. The sample ad, which you can see below.</p>-->
<!--                            </div>-->
<!--                            <div class="clearfix"></div>-->
<!--                        </div>-->
<!--                        <div class="postinfo pull-left">-->
<!--                            <div class="comments">-->
<!--                                <div class="commentbg">-->
<!--                                    89-->
<!--                                    <div class="mark"></div>-->
<!--                                </div>-->

<!--                            </div>-->
<!--                            <div class="views"><i class="fa fa-eye"></i> 1,568</div>-->
<!--                            <div class="time"><i class="fa fa-clock-o"></i> 15 min</div>-->
<!--                        </div>-->
<!--                        <div class="clearfix"></div>-->
<!--                    </div>&lt;!&ndash; POST &ndash;&gt;-->


<!--                    &lt;!&ndash; POST &ndash;&gt;-->
<!--                    <div class="post">-->
<!--                        <div class="wrap-ut pull-left">-->
<!--                            <div class="userinfo pull-left">-->
<!--                                <div class="avatar">-->
<!--                                    <img src="images/avatar3.jpg" alt="" />-->
<!--                                    <div class="status red">&nbsp;</div>-->
<!--                                </div>-->

<!--                                <div class="icons">-->
<!--                                    <img src="images/icon2.jpg" alt="" /><img src="images/icon4.jpg" alt="" />-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="posttext pull-left">-->
<!--                                <h2><a href="02_topic.html">The Future of Magazines Is on Tablets</a></h2>-->
<!--                                <p>Eric Schmidt has seen the future of magazines, and it's on the tablet. At a Magazine Publishers Association.</p>-->
<!--                            </div>-->
<!--                            <div class="clearfix"></div>-->
<!--                        </div>-->
<!--                        <div class="postinfo pull-left">-->
<!--                            <div class="comments">-->
<!--                                <div class="commentbg">-->
<!--                                    456-->
<!--                                    <div class="mark"></div>-->
<!--                                </div>-->

<!--                            </div>-->
<!--                            <div class="views"><i class="fa fa-eye"></i> 1,568</div>-->
<!--                            <div class="time"><i class="fa fa-clock-o"></i> 2 days</div>-->
<!--                        </div>-->
<!--                        <div class="clearfix"></div>-->
<!--                    </div>&lt;!&ndash; POST &ndash;&gt;-->


<!--                    &lt;!&ndash; POST &ndash;&gt;-->
<!--                    <div class="post">-->
<!--                        <div class="wrap-ut pull-left">-->
<!--                            <div class="userinfo pull-left">-->
<!--                                <div class="avatar">-->
<!--                                    <img src="images/avatar4.jpg" alt="" />-->
<!--                                    <div class="status yellow">&nbsp;</div>-->
<!--                                </div>-->

<!--                                <div class="icons">-->
<!--                                    <img src="images/icon1.jpg" alt="" /><img src="images/icon4.jpg" alt="" /><img src="images/icon6.jpg" alt="" />-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="posttext pull-left">-->
<!--                                <h2><a href="02_topic.html">Pinterest Now Worth $3.8 Billion</a></h2>-->
<!--                                <p>Pinterest's valuation is closing in on $4 billion after its latest funding round of $225 million, according to a report.</p>-->
<!--                            </div>-->
<!--                            <div class="clearfix"></div>-->
<!--                        </div>-->
<!--                        <div class="postinfo pull-left">-->
<!--                            <div class="comments">-->
<!--                                <div class="commentbg">-->
<!--                                    78-->
<!--                                    <div class="mark"></div>-->
<!--                                </div>-->

<!--                            </div>-->
<!--                            <div class="views"><i class="fa fa-eye"></i> 1,568</div>-->
<!--                            <div class="time"><i class="fa fa-clock-o"></i> 24 min</div>-->
<!--                        </div>-->
<!--                        <div class="clearfix"></div>-->
<!--                    </div>&lt;!&ndash; POST &ndash;&gt;-->



<!--                    &lt;!&ndash; POST &ndash;&gt;-->
<!--                    <div class="post">-->
<!--                        <div class="wrap-ut pull-left">-->
<!--                            <div class="userinfo pull-left">-->
<!--                                <div class="avatar">-->
<!--                                    <img src="images/avatar.jpg" alt="" />-->
<!--                                    <div class="status green">&nbsp;</div>-->
<!--                                </div>-->

<!--                                <div class="icons">-->
<!--                                    <img src="images/icon1.jpg" alt="" /><img src="images/icon4.jpg" alt="" />-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="posttext pull-left">-->
<!--                                <h2><a href="02_topic.html">10 Kids Unaware of Their Halloween Costume</a></h2>-->
<!--                                <p>It's one thing to subject yourself to a Halloween costume mishap because, hey, that's your prerogative.</p>-->
<!--                            </div>-->
<!--                            <div class="clearfix"></div>-->
<!--                        </div>-->
<!--                        <div class="postinfo pull-left">-->
<!--                            <div class="comments">-->
<!--                                <div class="commentbg">-->
<!--                                    560-->
<!--                                    <div class="mark"></div>-->
<!--                                </div>-->

<!--                            </div>-->
<!--                            <div class="views"><i class="fa fa-eye"></i> 1,568</div>-->
<!--                            <div class="time"><i class="fa fa-clock-o"></i> 24 min</div>-->
<!--                        </div>-->
<!--                        <div class="clearfix"></div>-->
<!--                    </div>&lt;!&ndash; POST &ndash;&gt;-->


<!--                    &lt;!&ndash; POST &ndash;&gt;-->
<!--                    <div class="post">-->
<!--                        <div class="wrap-ut pull-left">-->
<!--                            <div class="userinfo pull-left">-->
<!--                                <div class="avatar">-->
<!--                                    <img src="images/avatar2.jpg" alt="" />-->
<!--                                    <div class="status red">&nbsp;</div>-->
<!--                                </div>-->

<!--                                <div class="icons">-->
<!--                                    <img src="images/icon3.jpg" alt="" /><img src="images/icon4.jpg" alt="" /><img src="images/icon5.jpg" alt="" /><img src="images/icon6.jpg" alt="" />-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="posttext pull-left">-->
<!--                                <h2><a href="02_topic.html">What Instagram Ads Will Look Like</a></h2>-->
<!--                                <p>Instagram offered a first glimpse at what its ads will look like in a blog post Thursday. The sample ad, which you can see below.</p>-->
<!--                            </div>-->
<!--                            <div class="clearfix"></div>-->
<!--                        </div>-->
<!--                        <div class="postinfo pull-left">-->
<!--                            <div class="comments">-->
<!--                                <div class="commentbg">-->
<!--                                    89-->
<!--                                    <div class="mark"></div>-->
<!--                                </div>-->

<!--                            </div>-->
<!--                            <div class="views"><i class="fa fa-eye"></i> 1,568</div>-->
<!--                            <div class="time"><i class="fa fa-clock-o"></i> 15 min</div>-->
<!--                        </div>-->
<!--                        <div class="clearfix"></div>-->
<!--                    </div>&lt;!&ndash; POST &ndash;&gt;-->


<!--                    &lt;!&ndash; POST &ndash;&gt;-->
<!--                    <div class="post">-->
<!--                        <div class="wrap-ut pull-left">-->
<!--                            <div class="userinfo pull-left">-->
<!--                                <div class="avatar">-->
<!--                                    <img src="images/avatar3.jpg" alt="" />-->
<!--                                    <div class="status red">&nbsp;</div>-->
<!--                                </div>-->

<!--                                <div class="icons">-->
<!--                                    <img src="images/icon2.jpg" alt="" /><img src="images/icon4.jpg" alt="" />-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="posttext pull-left">-->
<!--                                <h2><a href="02_topic.html">The Future of Magazines Is on Tablets</a></h2>-->
<!--                                <p>Eric Schmidt has seen the future of magazines, and it's on the tablet. At a Magazine Publishers Association.</p>-->
<!--                            </div>-->
<!--                            <div class="clearfix"></div>-->
<!--                        </div>-->
<!--                        <div class="postinfo pull-left">-->
<!--                            <div class="comments">-->
<!--                                <div class="commentbg">-->
<!--                                    456-->
<!--                                    <div class="mark"></div>-->
<!--                                </div>-->

<!--                            </div>-->
<!--                            <div class="views"><i class="fa fa-eye"></i> 1,568</div>-->
<!--                            <div class="time"><i class="fa fa-clock-o"></i> 2 days</div>-->
<!--                        </div>-->
<!--                        <div class="clearfix"></div>-->
<!--                    </div>&lt;!&ndash; POST &ndash;&gt;-->
                </div>
                <AppSidebar></AppSidebar>
            </div>
        </div>



        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xs-12">
                    <div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>
                    <div class="pull-left">
                        <ul class="paginationforum">
                            <li v-for="(page, index) in paginationDraw(pagination.current_page, pagination.last_page)">
                                <a href="javascript:void(0)"
                                   :class="page == pagination.current_page ? 'active' : ''"
                                   @click="changePage(page)" v-if="page !== '...'">{{ page }}</a>
                                <a href="javascript:void(0)" v-else>{{ page }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>


    </section>

</template>
<script>
    import moment from 'moment';
    import AppSidebar from "./AppSidebar";
    import {mapState} from 'vuex';
    export default {
        name: 'Forum',
        components: {AppSidebar},
        data() {
            return {
                moment,
            }
        },
        created() {
            this.changePage();
        },
        computed: {
            ...mapState({
                questions: state => state.questions,
                pagination: state => state.questionsPagination,
            })
        },
        methods: {
            changePage(page = 1) {
                this.$store.dispatch('getQuestions', {
                    page: page,
                    searchText: new URLSearchParams(window.location.search).get('searchText'),
                });
            },
            paginationDraw(c, m) {
                const current = c;
                const last = m;
                const delta = 2;
                const left = current - delta;
                const right = current + delta + 1;
                const range = [];
                const rangeWithDots = [];
                let l;

                for (let i = 1; i <= last; i++) {
                    if ((i === 1 || i === last) || (i >= left && i < right)) {
                        range.push(i);
                    }
                }

                range.forEach((i) => {
                    if (l) {
                        if (i - l === 2) {
                            rangeWithDots.push(l + 1);
                        } else if (i - l !== 1) {
                            rangeWithDots.push('...');
                        }
                    }
                    rangeWithDots.push(i);
                    l = i;
                });
                return rangeWithDots;
            },

        }
    }
</script>