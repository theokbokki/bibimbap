<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title> {{ 'Bibimbap - ' . $headTitle }} </title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body class="app-container">
    <h1 class="sr-only">{{ $title }}</h1>
    <x-nav />
    {{ $slot }}
</body>

</html>
