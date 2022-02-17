@extends('layouts.app')

@section('content')
    <section class="main-home row" id="home" style="padding: 120px 0px 100px 0">
        <div class="home-page-photo"></div> <!-- Background image -->
        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" style="background-color: white; opacity: 0.9; border-radius: 15px">
            <p style="text-align: center; color: orangered; margin-top: 70px; font-size: 26px"><a href="">فضلاً، قم بملء الإستمارة للرد على استفساراتك</a></p>
            <form method="post" action="{{route('confirm_contact_us')}}" class="contact">
                @csrf
                <fieldset class="contact-inner">
                    <p class="contact-input">
                        <input type="text" name="name" placeholder=".. إسمك" required>
                    </p>

                    <p class="contact-input">
                        <input type="email" name="email" placeholder=".. بريدك الإلكتروني" required>
                    </p>

                    <p class="contact-input">
                        <textarea name="message" placeholder=".. أكتب رسالتك هنا" required></textarea>
                    </p>

                    <p class="contact-submit">
                        <input type="submit" value="أرسل الرسالة">
                    </p>
                </fieldset>
            </form>
        </div>
    </section>
@endsection