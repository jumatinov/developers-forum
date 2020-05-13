<template>
    <div class="container-fluid">

        <!-- Slider -->
        <div class="tp-banner-container">
            <div class="tp-banner" >
                <ul>
                    <!-- SLIDE  -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <!-- MAIN IMAGE -->
                        <img src="images/slide.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                    </li>
                </ul>
            </div>
        </div>
        <!-- //Slider -->

        <app-header></app-header>
        <app-main></app-main>
        <app-footer></app-footer>
    </div>

</template>

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
