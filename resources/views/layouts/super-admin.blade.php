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
<body class="font-sans antialiased bg-slate-50 text-slate-700" x-data="sidebar()"
      @resize.window="handleResize()">
<x-dialog z-index="z-50" blur="md" align="center" />
<div>
    <div class="xl:flex">
        @include('layouts.navigations.super-admin.sidebar-navigation')
        <div class="w-full">
            @include('layouts.navigations.super-admin.top-navigation')
            <main class="flex flex-col m-4">
                @if(isset($header))
                    <div class="shadow p-4 bg-white">
                        {{$header}}
                    </div>
                @endif
                @if(isset($actions))
                    <div class="shadow mt-4 p-4 bg-white">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
                            {{ __('Actions') }}
                        </h2>
                        {{$actions}}
                    </div>
                @endif
                @if(!isset($cardlayout))
                    <div class="shadow my-4 p-4 bg-white">
                        {{$slot}}
                    </div>
                @else
                    <div class="mt-4">
                        {{$cardlayout}}
                    </div>
                @endif
            </main>
        </div>
    </div>
    <script defer>
        function sidebar() {
            const breakpoint = 1280
            return {
                open: {
                    above: true,
                    below: false,
                },
                isAboveBreakpoint: window.innerWidth > breakpoint,

                handleResize() {
                    this.isAboveBreakpoint = window.innerWidth > breakpoint
                },

                isOpen() {
                    console.log(this.isAboveBreakpoint)
                    if (this.isAboveBreakpoint) {
                        return this.open.above
                    }
                    return this.open.below
                },
                handleOpen() {
                    if (this.isAboveBreakpoint) {
                        this.open.above = true
                    }
                    this.open.below = true
                },
                handleClose() {
                    if (this.isAboveBreakpoint) {
                        this.open.above = false
                    }
                    this.open.below = false
                },
                handleAway() {
                    if (!this.isAboveBreakpoint) {
                        this.open.below = false
                    }
                },
            }
        }
    </script>
</div>
@livewire('livewire-ui-modal')
</body>
</html>
