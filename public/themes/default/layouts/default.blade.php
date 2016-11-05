<!DOCTYPE html>
<html>
    <head>
        <title>{!! Theme::get('title') !!}</title>
        <meta charset="utf-8">
        <meta name="keywords" content="{!! Theme::get('keywords') !!}">
        <meta name="description" content="{!! Theme::get('description') !!}">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/bulma.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/font-awesome.css') }}">
        {!! Theme::asset()->styles() !!}
        {!! Theme::asset()->scripts() !!}
        <style type="text/css">
            html, body, header, .footer {
                background-color: white;
            }
        </style>
    </head>
    <body>
        {!! Theme::partial('navigation') !!}

        {!! Theme::partial('notification') !!}

        <div class="section">
            <div class="container">
            {!! Theme::content() !!}
            </div>
        </div>

        {!! Theme::partial('footer') !!}

        <script type="text/javascript" src="{{ url('/js/app.js') }}"></script>
        {!! Theme::asset()->container('footer')->scripts() !!}
    </body>
</html>
