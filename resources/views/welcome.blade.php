<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="app"></div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>    
</html>
