<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/app.css">

        <title>Questions</title>
    </head>
    <body>
        <div id="app">
            <questions></questions>
        </div>

        <script src="js/app.js"></script>
    </body>
</html>
