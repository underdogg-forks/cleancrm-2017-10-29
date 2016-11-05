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
        {!! Theme::partial('notification') !!}

        <div class="container is-fluid is-gapless is-paddingless is-marginless">
            {!! Theme::content() !!}
        </div>

        {!! Theme::partial('footer') !!}

        <script type="text/javascript" src="{{ url('/js/app.js') }}"></script>
        {!! Theme::asset()->container('footer')->scripts() !!}
    </body>
</html>
