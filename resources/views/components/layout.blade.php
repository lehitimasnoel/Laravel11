<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        @vite(['resources/css/users.css','resources/css/bootstrap.min.css'])

    </head>
    <body class="container">

       {{ $slot }}

    </body>
</html>
