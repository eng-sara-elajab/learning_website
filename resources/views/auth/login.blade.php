@extends('layouts.app')

@section('content')
    <section class="main-home" id="home">
        <div class="home-page-photo"></div> <!-- Background image -->
        <div class="home__header-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" style="background-color: white; border-radius: 15px; opacity: 0.7">
                    <p style="text-align: center; color: black; margin-top: 20px; font-size: 25px; opacity: 0.9">تسجيل الدخول</p><hr style="height: 1px">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="البريد الإلكتروني" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="كلمة السر" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                                <div class="form-check">
                                    <label class="form-check-label" for="remember" style="color: #0275d8; font-size: 16px">
                                        {{ __('تذكرني') }}
                                    </label>&nbsp;
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                                <button type="submit" class="btn btn-primary btn-block" style="font-size: 18px; border-radius: 5px">
                                    {{ __('دخول') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="font-size: 16px">
                                        {{ __('هل نسيت كلمة السر؟') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Login') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('login') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

                                {{--@error('email')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

                                {{--@error('password')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<div class="form-check">--}}
                                    {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                    {{--<label class="form-check-label" for="remember">--}}
                                        {{--{{ __('Remember Me') }}--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-8 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Login') }}--}}
                                {{--</button>--}}

                                {{--@if (Route::has('password.request'))--}}
                                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                        {{--{{ __('Forgot Your Password?') }}--}}
                                    {{--</a>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
