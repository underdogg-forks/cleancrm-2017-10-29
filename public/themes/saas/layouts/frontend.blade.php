<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('themes/saas/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('themes/saas/assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>{{ $title or config('app.name') }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ url('themes/saas/assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ url('themes/saas/assets/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ url('themes/saas/assets/css/paper-dashboard.css') }}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ url('themes/saas/assets/css/demo.css') }}" rel="stylesheet" />

    <!--  Fonts and icons     -->

    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ url('themes/saas/assets/css/themify-icons.css') }}" rel="stylesheet">

    <link href="{{ url('/css/font-awesome.css') }}" rel="stylesheet">

    {!! Theme::asset()->styles() !!}
    <style type="text/css">
        .main-panel {
            width: calc(100% - 0px);
        }
    </style>
</head>
<body>
        <div class="wrapper">

            <div class="main-panel">

                {!! Theme::partial('navigations.default') !!}

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            {!! Theme::content() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {!! Theme::partial('footer') !!}
        <!--   Core JS Files   -->
        <script src="{{ url('themes/saas/assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
        <script src="{{ url('themes/saas/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

        {!! Theme::asset()->scripts() !!}
    </body>
</html>
