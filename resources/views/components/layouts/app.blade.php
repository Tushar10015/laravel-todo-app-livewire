<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @livewireStyles
    @vite('resources/css/app.css')
</head>

<body>
    <div class="container">
        {{ $slot }} <!-- This is where the content of your Livewire component will be injected -->
    </div>
    @livewireScripts
    @vite('resources/js/app.js')

</body>

</html>