@extends('layouts.auth.base')

@section('body')
    <body class="nk-body npc-crypto bg-white pg-auth">
        <div class="nk-app-root">
            <div class="nk-split nk-split-page nk-split-md">
                @include('layouts.auth.header')
                <!-- .nk-split-content @s -->
                @yield('content')
                <!-- .nk-split-content -->
                @include('layouts.auth.split')
            </div><!-- .nk-split -->
        </div>
        <!-- app-root @e -->

        @yield('modal')
        <!-- BEGIN: JS Assets-->
        <!-- JavaScript -->
        <script src="{{asset('src/assets/js/bundle.js?ver=2.2.0')}}"></script>
        <script src="{{asset('src/assets/js/scripts.js?ver=2.2.0')}}"></script>
        <!-- END: JS Assets-->

        @yield('script')
    </body>
@endsection
