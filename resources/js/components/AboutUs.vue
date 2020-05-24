<template>
    <div class="about">
        <div class="about-content">
            <div class="image"></div>
            <div style="padding: 50px;">
                <h2 style="width: 100%; text-align: center;">О нас</h2>
                <div style="display: flex;">
<!--                    <div class="image2"></div>-->
<!--                    <p class="black" style="width:66%;font-size: 16px;padding: 10px 10px 10px 30px">"Форум Разработчиков" - это веб-сайт в формате вопрос - ответ.-->
<!--                        Здесь вы сможете задать вопрос как по технической части, так и завести небольшое обсуждение по той или иной теме.-->
<!--                        <br><br><br>-->
<!--                        "Форум Разработчиков" создан 2020 ом году.-->
<!--                    </p>-->
                    <div class="item">
                        <i class="fa fa-phone icon"></i>
                        <div class="title">Контакты</div>
                        <div class="description black">Номер: +77007291775</div>
                    </div>
                    <div class="item">
<!--                        i.fa.fa- -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
    .item {
        width: 33%;
        padding: 30px;
    }
    .item .icon {
        font-size: 60px;
    }
    .item .title {
        font-size: 18px;
    }
    .about {
        width: 100%;
        padding: 80px;
        height: calc(100vh - 140px);
        background: #ecf0f1;
    }
    .about-content {
        width: 100%;
        background: #fff;
    }
    .black {
        color: #000;
    }
    .image {
        width: 100%;
        height: 200px;
        background-position: center;
        background-image: url("/images/about.jpg");
    }
    .image2 {
        width: 33%;
        height: 250px;
        background-position: top;background-size: cover;
        background-image: url("/images/about1.jpeg");
    }
</style>
<script>
    export default {
        name: 'AboutUs',
    }
</script>