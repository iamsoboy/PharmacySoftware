@extends('layouts.pharmacy.base')

@section('body')
    <body class="nk-body bg-white has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main">
            @include('layouts.pharmacy.sidebar')
                <!-- wrap @s -->
                <div class="nk-wrap ">
                    <!-- main header @s -->
                    @include('layouts.pharmacy.header')
                    <!-- main header @e -->

                        <!-- content @s -->
                        @yield('content')
                        <!-- content @e -->

                    <!-- footer @s -->
                    @include('layouts.pharmacy.footer')
                    <!-- footer @e -->
                </div>
                <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->

    @yield('modal')
    <!-- BEGIN: JS Assets-->
    <!-- JavaScript -->
    <script src="{{asset('src/assets/js/bundle.js?ver=2.2.0')}}"></script>
    <script src="{{asset('src/assets/js/scripts.js?ver=2.2.0')}}"></script>
    <script src="{{asset('src/assets/js/select2.min.js')}}"></script>
    <!-- END: JS Assets-->

    @yield('script')
    @livewireScripts
    @stack('scripts')
    </body>
@endsection
