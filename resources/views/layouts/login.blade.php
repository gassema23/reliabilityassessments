<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', __('generals.sitename')) }}</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ url('favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ url('favicon/safari-pinned-tab.svg') }}" color="#787878">
    <meta name="msapplication-TileColor" content="#603cba">
    <meta name="theme-color" content="#ffffff">
    <!-- Scripts -->
    @wireUiScripts
    @livewireScripts
    @powerGridScripts
    <!-- Vite compile -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- CSS -->
    @livewireStyles
    @powerGridStyles
</head>
<body class="font-sans antialiased">
<div class="font-sans text-gray-900 antialiased">
    {{ $slot }}
</div>
@livewire('livewire-ui-modal')
</body>
</html>
