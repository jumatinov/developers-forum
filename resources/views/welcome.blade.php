<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Developers forum</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('templateCss/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom -->
        <link href="{{ asset('templateCss/custom.css') }}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('font-awesome-4.0.3/css/font-awesome.min.css') }}">

        <!-- CSS STYLE-->
        <link rel="stylesheet" type="text/css" href="{{ asset('templateCss/style.css') }}" media="screen" />

        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('rs-plugin/css/settings.css') }}" media="screen" />
        <script>
            window.myApp = <?php echo json_encode([
                'csrfToken' => csrf_token(),
                'base_url' => \URL::to('/'),
                'user' => session('user')
            ]); ?>

        </script>

    </head>
    <body>
    <div id="loader-content">
        <div class="loader-content-icon"></div>
    </div>
    <div id="app"></div>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>


    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

    <script src="{{ asset('templateJs/bootstrap.min.js') }}"></script>


    <!-- LOOK THE DOCUMENTATION FOR MORE INFORMATIONS -->
    <script type="text/javascript">

        var revapi;

        jQuery(document).ready(function() {
            "use strict";
            revapi = jQuery('.tp-banner').revolution(
                {
                    delay: 15000,
                    startwidth: 1200,
                    startheight: 278,
                    hideThumbs: 10,
                    fullWidth: "on"
                });

        });	//ready

    </script>

    </body>
</html>
