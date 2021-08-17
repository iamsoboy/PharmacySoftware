<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <meta name="description" content="modern responsive pharmacy software">
    <meta name="keywords" content="hospital, pharmacy, module, software, brain&paper">
    <meta name="Company" content="Brain&Paper LLC">
    <meta name="author" content="Prince Charles">

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('src/images/favicon.png')}}">
@yield('head')

<!-- BEGIN: CSS Assets-->
    @livewireStyles
    <link rel="stylesheet" href="{{asset('src/assets/css/dashlite.css?ver=2.2.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('src/assets/css/theme.css?ver=2.2.0')}}">
    <!--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />-->

    <!--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>-->
@yield('customCss')
<!-- END: CSS Assets-->
</head>
<!-- END: Head -->

@yield('body')

</html>
