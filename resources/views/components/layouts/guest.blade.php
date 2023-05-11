<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title ?? config('helpdesk.app_name') }}</title>

    <link rel="stylesheet" href="{{ asset('vendor/helpdesk/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/helpdesk/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/helpdesk/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/helpdesk/izitoast/iziToast.min.css') }}">

    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('favicon.ico') }}' />
    <script src="{{ asset('vendor/helpdesk/js/app.js') }}"></script>
    {{-- <link href="{{ asset('vendor/helpdesk/css/app.css') }}" rel="stylesheet" /> --}}

    {{ $styles ?? '' }}
</head>

<body x-data="mainState"
    :class="{
        ['dark dark-sidebar theme-black']: isDarkMode,
        ['light light-sidebar theme-white']: !isDarkMode
    }">
    <div class="loader"></div>
    <div id="app">
        <!-- Main Content -->
        {{ $slot }}
    </div>

    {{ $modals ?? '' }}

    <script src="{{ asset('vendor/helpdesk/js/app.min.js') }}"></script>
    <script src="{{ asset('vendor/helpdesk/js/scripts.js') }}"></script>
    <script src="{{ asset('vendor/helpdesk/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('vendor/helpdesk/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('vendor/helpdesk/izitoast/iziToast.min.js') }}"></script>

    {{ $scripts ?? '' }}
</body>

</html>
