@extends('layouts.app')

@section('content')
    <section class="main-home row" id="home" style="padding: 120px 0px 100px 0">
        <div class="home-page-photo"></div> <!-- Background image -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12" style="background-color: white; opacity: 0.9; border-radius: 10px">
                <div class="overlay"></div>
                <div class="col-xl-3 col-xl-offset-1 col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-10 col-sm-offset-1 col-10 offset-1" style="margin-top: 5%; border-radius: 15px; border: groove; background-color: whitesmoke">
                    <img src="{{$website_information->logo == null ? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0zKc2imsHbSQDL13AaM7Mg_-r8fuqe4pjCg&usqp=CAU' : asset('images/logos/'.$website_information->logo)}}" class="img-responsive" style="width: 100%; height: 40%; border-radius: 50%; margin-top: 10%">
                    <div class="fh5co-contact-info" style="margin-bottom: 5%">
                        <p style="color: orangered; margin: 10%; font-size: 26px">معلومات المالك</p>
                        <h5 class="phone" style="text-align: center; color: darkgrey"><a href="">{{$website_information->phone}}</a></h5>
                        <h5 class="email" style="text-align: center; color: darkgrey"><a href="">{{$website_information->email}}</a></h5>
                        <h5 class="address" style="text-align: center; color: darkgrey"><a href="">{{$website_information->address}}</a></h5>
                        {{--<h5 class="phone" style="text-align: center; color: darkgrey"><a href="">00249917854712</a></h5>--}}
                        {{--<h5 class="email" style="text-align: center; color: darkgrey"><a href="">admin@websitename.com</a></h5>--}}
                        {{--<h5 class="address" style="text-align: center; color: darkgrey"><a href="">Tyler Hamilton, 123 Scenic Drive Houston, TX 77007</a></h5>--}}
                    </div>
                </div>
                <div class="col-xl-6 col-xl-offset-1 col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-10 col-sm-offset-1 col-10 offset-1" style="margin-top: 5%">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="font-family: 'Segoe UI'; text-align: center">
                        <p style="color: orangered; margin-top: 3%; font-size: 26px"><a href="">من نحن؟</a></p>
                        <p style="color: darkgrey; margin-top: 3%; margin-bottom: 3%; font-size: 14px">{{$website_information->description}}</p>
                        {{--<p style="color: darkgrey; margin-top: 3%; margin-bottom: 3%; font-size: 14px">--}}
                        {{--{{ __('المادة 2 لكل إنسان حق التمتع بكافة الحقوق والحريات الواردة في هذا الإعلان، دون أي تمييز، كالتمييز بسبب العنصر أو اللون أو الجنس أو اللغة أو الدين أو الرأي السياسي أو أي رأي آخر، أو الأصل الوطني أو الإجتماعي أو الثروة أو الميلاد أو أي وضع آخر، دون أية تفرقة بين الرجال والنساء. وفضلاً عما تقدم فلن يكون هناك أي تمييز أساسه الوضع السياسي أو القانوني أو الدولي لبلد أو البقعة التي ينتمي إليها الفرد سواء كان هذا البلد أو تلك البقعة مستقلاً أو تحت الوصاية أو غير متمتع بالحكم الذاتي أو كانت سيادته خاضعة لأي قيد من القيود') }}--}}
                        {{--{{ __('المادة 2 لكل إنسان حق التمتع بكافة الحقوق والحريات الواردة في هذا الإعلان، دون أي تمييز، كالتمييز بسبب العنصر أو اللون أو الجنس أو اللغة أو الدين أو الرأي السياسي أو أي رأي آخر، أو الأصل الوطني أو الإجتماعي أو الثروة أو الميلاد أو أي وضع آخر، دون أية تفرقة بين الرجال والنساء. وفضلاً عما تقدم فلن يكون هناك أي تمييز أساسه الوضع السياسي أو القانوني أو الدولي لبلد أو البقعة التي ينتمي إليها الفرد سواء كان هذا البلد أو تلك البقعة مستقلاً أو تحت الوصاية أو غير متمتع بالحكم الذاتي أو كانت سيادته خاضعة لأي قيد من القيود') }}--}}
                        {{--{{ __('المادة 2 لكل إنسان حق التمتع بكافة الحقوق والحريات الواردة في هذا الإعلان، دون أي تمييز، كالتمييز بسبب العنصر أو اللون أو الجنس أو اللغة أو الدين أو الرأي السياسي أو أي رأي آخر، أو الأصل الوطني أو الإجتماعي أو الثروة أو الميلاد أو أي وضع آخر، دون أية تفرقة بين الرجال والنساء. وفضلاً عما تقدم فلن يكون هناك أي تمييز أساسه الوضع السياسي أو القانوني أو الدولي لبلد أو البقعة التي ينتمي إليها الفرد سواء كان هذا البلد أو تلك البقعة مستقلاً أو تحت الوصاية أو غير متمتع بالحكم الذاتي أو كانت سيادته خاضعة لأي قيد من القيود') }}--}}
                        {{--</p>--}}
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 5%; font-family: 'Segoe UI'; text-align: center;">
                        <p style="color: orangered; margin-top: 3%; font-size: 26px"><a href="">رسالتنا</a></p>
                        <p style="color: darkgrey; margin-top: 3%; margin-bottom: 3%; font-size: 14px">{{$website_information->mission}}</p>
                        {{--<p style="color: darkgrey; margin-top: 3%; margin-bottom: 3%; font-size: 14px">--}}
                        {{--{{ __('المادة 2 لكل إنسان حق التمتع بكافة الحقوق والحريات الواردة في هذا الإعلان، دون أي تمييز، كالتمييز بسبب العنصر أو اللون أو الجنس أو اللغة أو الدين أو الرأي السياسي أو أي رأي آخر، أو الأصل الوطني أو الإجتماعي أو الثروة أو الميلاد أو أي وضع آخر، دون أية تفرقة بين الرجال والنساء. وفضلاً عما تقدم فلن يكون هناك أي تمييز أساسه الوضع السياسي أو القانوني أو الدولي لبلد أو البقعة التي ينتمي إليها الفرد سواء كان هذا البلد أو تلك البقعة مستقلاً أو تحت الوصاية أو غير متمتع بالحكم الذاتي أو كانت سيادته خاضعة لأي قيد من القيود') }}--}}
                        {{--{{ __('المادة 2 لكل إنسان حق التمتع بكافة الحقوق والحريات الواردة في هذا الإعلان، دون أي تمييز، كالتمييز بسبب العنصر أو اللون أو الجنس أو اللغة أو الدين أو الرأي السياسي أو أي رأي آخر، أو الأصل الوطني أو الإجتماعي أو الثروة أو الميلاد أو أي وضع آخر، دون أية تفرقة بين الرجال والنساء. وفضلاً عما تقدم فلن يكون هناك أي تمييز أساسه الوضع السياسي أو القانوني أو الدولي لبلد أو البقعة التي ينتمي إليها الفرد سواء كان هذا البلد أو تلك البقعة مستقلاً أو تحت الوصاية أو غير متمتع بالحكم الذاتي أو كانت سيادته خاضعة لأي قيد من القيود') }}--}}
                        {{--{{ __('المادة 2 لكل إنسان حق التمتع بكافة الحقوق والحريات الواردة في هذا الإعلان، دون أي تمييز، كالتمييز بسبب العنصر أو اللون أو الجنس أو اللغة أو الدين أو الرأي السياسي أو أي رأي آخر، أو الأصل الوطني أو الإجتماعي أو الثروة أو الميلاد أو أي وضع آخر، دون أية تفرقة بين الرجال والنساء. وفضلاً عما تقدم فلن يكون هناك أي تمييز أساسه الوضع السياسي أو القانوني أو الدولي لبلد أو البقعة التي ينتمي إليها الفرد سواء كان هذا البلد أو تلك البقعة مستقلاً أو تحت الوصاية أو غير متمتع بالحكم الذاتي أو كانت سيادته خاضعة لأي قيد من القيود') }}--}}
                        {{--</p>--}}
                    </div>
                </div>
                {{--<div class="col-xl-10 col-xl-offset-1 col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-10 offset-1" style="margin-bottom: 5%; font-family: 'Segoe UI'; text-align: center">--}}
                {{--<p style="color: orangered; margin-top: 3%; font-size: 26px"><a href="">رسالتنا</a></p>--}}
                {{--<p style="color: darkgrey; margin-top: 2%; font-size: 16px">{{$website_information->mission}}</p>--}}
                {{--<p style="color: darkgrey; margin-top: 2%; font-size: 16px">--}}
                {{--{{ __('المادة 2 لكل إنسان حق التمتع بكافة الحقوق والحريات الواردة في هذا الإعلان، دون أي تمييز، كالتمييز بسبب العنصر أو اللون أو الجنس أو اللغة أو الدين أو الرأي السياسي أو أي رأي آخر، أو الأصل الوطني أو الإجتماعي أو الثروة أو الميلاد أو أي وضع آخر، دون أية تفرقة بين الرجال والنساء. وفضلاً عما تقدم فلن يكون هناك أي تمييز أساسه الوضع السياسي أو القانوني أو الدولي لبلد أو البقعة التي ينتمي إليها الفرد سواء كان هذا البلد أو تلك البقعة مستقلاً أو تحت الوصاية أو غير متمتع بالحكم الذاتي أو كانت سيادته خاضعة لأي قيد من القيود') }}--}}
                {{--</p>--}}
                {{--</div>--}}
                <div class="col-xl-6 col-xl-offset-1 col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-10 col-sm-offset-1 col-10 offset-1" style="margin-bottom: 5%; font-family: 'Segoe UI'; text-align: center; margin-top: 3%">
                    <p style="color: orangered; margin-top: 3%; font-size: 26px"><a href="">رؤيتنا</a></p>
                    <p style="color: darkgrey; margin-top: 2%; font-size: 16px">
                        {{$website_information->vision}}
                    </p>
                    {{--<p style="color: darkgrey; margin-top: 2%; font-size: 16px">--}}
                    {{--{{ __('المادة 2 لكل إنسان حق التمتع بكافة الحقوق والحريات الواردة في هذا الإعلان، دون أي تمييز، كالتمييز بسبب العنصر أو اللون أو الجنس أو اللغة أو الدين أو الرأي السياسي أو أي رأي آخر، أو الأصل الوطني أو الإجتماعي أو الثروة أو الميلاد أو أي وضع آخر، دون أية تفرقة بين الرجال والنساء. وفضلاً عما تقدم فلن يكون هناك أي تمييز أساسه الوضع السياسي أو القانوني أو الدولي لبلد أو البقعة التي ينتمي إليها الفرد سواء كان هذا البلد أو تلك البقعة مستقلاً أو تحت الوصاية أو غير متمتع بالحكم الذاتي أو كانت سيادته خاضعة لأي قيد من القيود') }}--}}
                    {{--</p>--}}
                </div>
            </div>
        </div>
    </section>
@endsection