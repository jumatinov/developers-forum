<template>
    <section class="content" style="height:calc(100vh - 150px)">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 breadcrumbf">
                    <a href="#">Вход</a>
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
                                <h2><img src="images/logo.jpg" alt="" style="margin-right: 30px"/>Вход</h2>
                            </div>

                            <!-- acc section -->
                            <div class="accsection">
                                <div class="topwrap">

                                    <div style="padding:30px;">
                                        <div>
                                            <input type="text" placeholder="Email" v-model="email" class="form-control" />
                                        </div>
                                        <div>
                                            <input type="password" placeholder="Пароль" v-model="password" class="form-control" />
                                        </div>
                                        <div>
                                            <span id="error">Логин или пароль не верен.</span>
                                        </div>
                                        <button class="btn btn-primary" style="margin-top: 50px;" @click="login">Войти</button>
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
<style>
    #error {
        color:red; font-size: 14px; margin-top:10px; display: none;
    }
</style>
<script>
    import router from "../router";
    export default {
        name: 'login',
        data() {
            return {
                password: '',
                username: '',
                email: '',
            }
        },
        methods: {
            login() {
                showLoader();
                this.$store.dispatch('login', {
                    password: this.password,
                    email: this.email,
                })
                    .then((response) => {
                        this.saveToken(response.data.api_token);
                        return this.$store.dispatch('getMe');
                    })
                    .then((response) => {
                        this.saveMe(response.data);
                        this.$store.commit('updateMe', response.data);
                        this.$store.commit('updateStateIsLogged', true);
                        return response;
                    })
                    .then(() => {
                        router.push('/app/profile');
                        hideLoader();
                    })
                    .catch((error) => {
                        hideLoader();
                        document.getElementById('error').style.display = 'inline';
                    });
            }
        }
    }
</script>