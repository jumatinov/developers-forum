<template>
    <section class="content" style="height:calc(100vh - 150px)">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 breadcrumbf">
                    <a href="#">Регистрация</a>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row d-flex justify-content-center" style="display: flex; justify-content: center;">
                <div class="col-lg-8 col-md-8">



                    <!-- POST -->
                    <div class="post">
                        <div action="#" class="form newtopic">
                            <div class="postinfotop">
                                <h2><img src="images/logo.jpg" alt="" style="margin-right: 30px"/>Регистрация</h2>
                            </div>

                            <!-- acc section -->
                            <div class="accsection">
                                <div class="topwrap">

                                    <div style="padding:30px;">

                                        <div>
                                            <input type="text" placeholder="Имя" v-model="user.name" class="form-control" />
                                        </div>
                                        <div>
                                            <input type="text" placeholder="Фамилия" v-model="user.surname" class="form-control" />
                                        </div>
                                        <div>
                                            <input type="text" placeholder="Username" v-model="user.username" class="form-control" />
                                        </div>
                                        <div>
                                            <input type="text" placeholder="Email" v-model="user.email" class="form-control" />
                                        </div>
                                        <div>
                                            <input type="password" placeholder="Пароль" v-model="user.password" class="form-control" />
                                        </div>
                                        <div>
                                            <span id="error">Логин или пароль не верен.</span>
                                        </div>
                                        <button class="btn btn-primary" style="margin-top: 50px;" @click="signup">Зарегистрироваться</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div><!-- acc section END -->



                            <!-- acc section -->

                        </div>
                    </div><!-- POST -->






                </div>

            </div>
        </div>


    </section>
</template>
<script>
    import router from "../router";

    export default {
        name: 'Signup',
        data() {
            return {
                user: {
                    password: '',
                    username: '',
                    name: '',
                    surname: '',
                    email: '',
                }
            }
        },
        methods: {
            signup() {
                showLoader();
                this.$store.dispatch('signup', this.user).then((response) => {
                    this.saveMe(response.data);
                    this.saveToken(response.data.api_token);
                    this.$store.commit('updateStateIsLogged', true);
                    router.push('/profile');
                    hideLoader();
                });
            },
        }
    }
</script>