@extends('layouts.app')

@section('content')
    <section class="main-home" id="home">
        <div class="home-page-photo"></div> <!-- Background image -->
        <div class="home__header-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" style="background-color: white; border-radius: 15px; opacity: 0.7">
                    <p style="text-align: center; color: black; margin-top: 20px; font-size: 25px; opacity: 0.9">إنشاء حساب</p><hr style="height: 1px">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="الإسم" value="{{ old('name') }}" required autocomplete="name">

                                @error('name')
                                <span class="invalid-feedback" role="alert" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="البريد الإلكتروني" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="كلمة السر" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert" style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="تأكيد كلمة السر" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                                <button type="submit" class="btn btn-primary btn-block" style="margin-top: 10px; margin-bottom: 10px; font-size: 18px; border-radius: 5px">
                                {{ __('إنشاء') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
