@extends('layouts.auth.main')

@section('head')
    <title>Login Now</title>
@endsection

@section('content')
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title">Sign-In</h5>
                    <div class="nk-block-des">
                        <p>Access the Pharmacy panel using your username and password.</p>
                    </div>
                </div>

                @if (session()->has('success_message'))
                    <div class="alert alert-fill alert-icon alert-primary mt-4" role="alert">
                        <em class="icon ni ni-alert-circle"></em>
                        <strong>{{session()->get('success_message')}}</strong>.
                    </div>
                @elseif(session()->has('status'))
                    <div class="alert alert-fill alert-icon alert-warning mt-4" role="alert">
                        <em class="icon ni ni-alert-circle"></em>
                        <strong>{{session()->get('status')}}</strong>.
                    </div>
                @endif
            </div><!-- .nk-block-head -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="default-01">Username</label>
                    </div>
                    <input type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="Enter your username">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div><!-- .foem-group -->
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="password">Password</label>
                        {{--if (Route::has('password.request'))
                            <a class="link link-primary link-sm" tabindex="-1" href="{{ route('password.request') }}">Forgot Code?</a>
                        @endif--}}
                    </div>
                    <div class="form-control-wrap">
                        <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div><!-- .foem-group -->
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                </div>
            </form><!-- form -->


        </div><!-- .nk-block -->
        @include('layouts.auth.footer')
    </div><!-- .nk-split-content -->
@endsection
