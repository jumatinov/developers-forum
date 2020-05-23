<template>
    <div class="container-fluid">
        <!-- Slider -->
<!--        <div class="tp-banner-container">-->
<!--            <div class="tp-banner" >-->
<!--                <ul>-->
<!--                    &lt;!&ndash; SLIDE  &ndash;&gt;-->
<!--                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >-->
<!--                        &lt;!&ndash; MAIN IMAGE &ndash;&gt;-->
<!--                        <img src="images/slide.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">-->
<!--                        &lt;!&ndash; LAYERS &ndash;&gt;-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
        <!-- //Slider -->

        <app-header></app-header>
<!--        <app-main></app-main>-->
        <router-view />
        <app-footer></app-footer>
    </div>

</template>
<style>
    #loader-content {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        background: rgba(0, 0, 0, 0.541176);
        z-index: 9999;
        width: 100%;
        height: 100%;
        display: none;
    }

    #loader-content.active {
        display: -webkit-box;
        display: flex;
    }

    .loader-content-icon {
        border: 4px solid #fff;
        width: 130px;
        height: 130px;
        border-radius: 50%;
        border-right-color: transparent;
        border-top-color: transparent;
        -webkit-animation-name: load;
        animation-name: load;
        -webkit-animation-duration: 1.3s;
        animation-duration: 1.3s;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
    }

    @-webkit-keyframes load {
        from {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        to {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes load {
        from {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        to {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
</style>
<script>
    import AppFooter from './Footer.vue';
    import AppMain from './Main.vue';
    import AppHeader from './Header.vue';
    export default {
        components: {AppFooter, AppMain, AppHeader},
        mounted() {

        }
    }
</script>
