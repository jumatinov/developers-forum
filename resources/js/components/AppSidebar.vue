<template>
    <div class="col-lg-4 col-md-4">

        <!-- -->
        <div class="sidebarblock">
            <h3>Categories</h3>
            <div class="divline"></div>
            <div class="blocktxt">
                <ul class="cats">
                    <li v-for="tag in tags">
                        <a href="#">{{ tag.name }} <span class="badge pull-right">{{ tag.question_count }}</span></a>
                    </li>
<!--                    <li><a href="#">Trading for Money <span class="badge pull-right">20</span></a></li>-->
<!--                    <li><a href="#">Vault Keys Giveway <span class="badge pull-right">10</span></a></li>-->
<!--                    <li><a href="#">Misc Guns Locations <span class="badge pull-right">50</span></a></li>-->
<!--                    <li><a href="#">Looking for Players <span class="badge pull-right">36</span></a></li>-->
<!--                    <li><a href="#">Stupid Bugs &amp; Solves <span class="badge pull-right">41</span></a></li>-->
<!--                    <li><a href="#">Video &amp; Audio Drivers <span class="badge pull-right">11</span></a></li>-->
<!--                    <li><a href="#">2K Official Forums <span class="badge pull-right">5</span></a></li>-->
                </ul>
            </div>
        </div>

        <!-- -->
        <div class="sidebarblock">
            <h3>Опрос недели</h3>
            <div class="divline"></div>
            <div class="blocktxt">
                <p>Какой фреймворк на данный момент самый популярны в FrontEnd?</p>
                <form action="#" method="post" class="form">
                    <table class="poll">
                        <tr>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar color1" role="progressbar" aria-valuenow="40"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                        React
                                    </div>
                                </div>
                            </td>
                            <td class="chbox">
                                <input id="opt1" type="radio" name="opt" value="1">
                                <label for="opt1"></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar color2" role="progressbar" aria-valuenow="40"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 63%">
                                        VueJs
                                    </div>
                                </div>
                            </td>
                            <td class="chbox">
                                <input id="opt2" type="radio" name="opt" value="2" checked>
                                <label for="opt2"></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar color3" role="progressbar" aria-valuenow="40"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                        Angular
                                    </div>
                                </div>
                            </td>
                            <td class="chbox">
                                <input id="opt3" type="radio" name="opt" value="3">
                                <label for="opt3"></label>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <!-- -->
        <div class="sidebarblock">
            <h3>My Active Threads</h3>
            <div class="divline"></div>
            <div class="blocktxt">
                <a href="#">This Dock Turns Your iPhone Into a Bedside Lamp</a>
            </div>
            <div class="divline"></div>
            <div class="blocktxt">
                <a href="#">Who Wins in the Battle for Power on the Internet?</a>
            </div>
            <div class="divline"></div>
            <div class="blocktxt">
                <a href="#">Sony QX10: A Funky, Overpriced Lens Camera for Your Smartphone</a>
            </div>
            <div class="divline"></div>
            <div class="blocktxt">
                <a href="#">FedEx Simplifies Shipping for Small Businesses</a>
            </div>
            <div class="divline"></div>
            <div class="blocktxt">
                <a href="#">Loud and Brave: Saudi Women Set to Protest Driving Ban</a>
            </div>
        </div>

    </div>
</template>
<script>
    import {mapState} from 'vuex';
    export default {
        name: 'AppSidebar',
        created() {
            showLoader();
            this.$store.dispatch('getTags').then(hideLoader);
        },
        computed: {
            ...mapState({
                tags: state => state.tags,
            })
        }
    }
</script>