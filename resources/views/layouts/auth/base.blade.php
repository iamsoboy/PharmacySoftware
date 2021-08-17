<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{ asset('src/images/favicon.png') }}" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <meta name="description" content="modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="responsive admin template, web app">
    <meta name="author" content="Prince Charles">

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('src/images/favicon.png')}}">

@yield('head')

<!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('src/assets/css/dashlite.css?ver=2.2.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('src/assets/css/theme.css?ver=2.2.0')}}">
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

@yield('body')

</html>
