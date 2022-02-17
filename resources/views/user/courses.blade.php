@extends('layouts.app')

@section('content')
    <section class="main-home row" id="home" style="padding: 180px 0px 100px 0">
        <div class="home-page-photo"></div> <!-- Background image -->
        @if(count($online_classes) > 0)
            <ul class="col-xl-10 col-xl-offset-1 col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12" style="background-color: white; opacity: 0.9; border-radius: 10px">
                @foreach($online_classes as $online_class)
                    <li class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12" style="margin-top: 50px">
                        <img alt="" src="images/courses/{{$online_class->course_photo}}" draggable="false" style="width: 80%; height: 200px">
                        <div class="details" style="color: black">
                            <h4 style="text-align: center; margin-top: 10px">{{$online_class->topic}}</h4>
                            <p class="description" style="font-size: 12px">
                                @if(strlen($online_class->description) < 50)
                                    {{$online_class->description}}
                                @else
                                    {{Str::limit($online_class->description, 50)}}
                                @endif
                            </p>
                            <a href="{{route('online_classes.index')}}/#{{$online_class->id}}" class="btn btn-info btn-lg" style="border-radius: 10px; font-weight: bold; margin-top: 10px">عرض التفاصيل</a>
                        </div><hr style="height: 1px; background-color: darkgrey">
                    </li>
                @endforeach
                {{--<li class="col-md-4" style="margin-top: 50px">--}}
                    {{--<img alt="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2eBpV0hYi4Wy4qaJ_CmUENQxEYeW_FjTM7g&usqp=CAU" draggable="false" style="width: 80%; height: 200px">--}}
                    {{--<div class="details" style="color: black">--}}
                        {{--<h4 style="text-align: center; margin-top: 10px">Laravel</h4>--}}
                        {{--<p class="description">{{ __('المادة 2 لكل إنسان حق التمتع بكافة الحقوق والحريات الواردة في هذا الإعلان، دون أي تمييز، كالتمييز بسبب العنصر أو اللون أو الجنس أو اللغة أو الدين أو الرأي السياسي أو أي رأي آخر، أو الأصل الوطني أو الإجتماعي أو الثروة أو الميلاد أو أي وضع آخر، دون أية تفرقة بين الرجال والنساء') }}</p>--}}
                        {{--<button class="btn btn-info btn-lg" style="border-radius: 10px; font-weight: bold; margin-top: 10px">عرض التفاصيل</button>--}}
                    {{--</div><hr style="height: 1px; background-color: darkgrey">--}}
                {{--</li>--}}
                {{--<li class="col-md-4" style="margin-top: 50px">--}}
                    {{--<img alt="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaVJDzxfHvN2y2LDUzZn-dMx-Pry-vwTAfTA&usqp=CAU" draggable="false" style="width: 80%; height: 200px">--}}
                    {{--<div class="details" style="color: black">--}}
                        {{--<h4 style="text-align: center; margin-top: 10px">Python</h4>--}}
                        {{--<p class="description">{{ __('المادة 2 لكل إنسان حق التمتع بكافة الحقوق والحريات الواردة في هذا الإعلان، دون أي تمييز، كالتمييز بسبب العنصر أو اللون أو الجنس أو اللغة أو الدين أو الرأي السياسي أو أي رأي آخر، أو الأصل الوطني أو الإجتماعي أو الثروة أو الميلاد أو أي وضع آخر، دون أية تفرقة بين الرجال والنساء') }}</p>--}}
                        {{--<button class="btn btn-info btn-lg" style="border-radius: 10px; font-weight: bold; margin-top: 10px">عرض التفاصيل</button>--}}
                    {{--</div><hr style="height: 1px; background-color: darkgrey">--}}
                {{--</li>--}}
                {{--<li class="col-md-4" style="margin-top: 50px">--}}
                    {{--<img alt="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSz5oTqaKF3L4lgpTLaaSKGWulyqxadmVHd4g&usqp=CAU" draggable="false" style="width: 80%; height: 200px">--}}
                    {{--<div class="details" style="color: black">--}}
                        {{--<h4 style="text-align: center; margin-top: 10px">Django</h4>--}}
                        {{--<p class="description">{{ __('المادة 2 لكل إنسان حق التمتع بكافة الحقوق والحريات الواردة في هذا الإعلان، دون أي تمييز، كالتمييز بسبب العنصر أو اللون أو الجنس أو اللغة أو الدين أو الرأي السياسي أو أي رأي آخر، أو الأصل الوطني أو الإجتماعي أو الثروة أو الميلاد أو أي وضع آخر، دون أية تفرقة بين الرجال والنساء') }}</p>--}}
                        {{--<button class="btn btn-info btn-lg" style="border-radius: 10px; font-weight: bold; margin-top: 10px">عرض التفاصيل</button>--}}
                    {{--</div><hr style="height: 1px; background-color: darkgrey">--}}
                {{--</li>--}}
                {{--<li class="col-md-4" style="margin-top: 50px">--}}
                    {{--<img alt="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREdf52S-CZbLoluvHHOV3NFkg1UOAM3QT69A&usqp=CAU" draggable="false" style="width: 80%; height: 200px">--}}
                    {{--<div class="details" style="color: black">--}}
                        {{--<h4 style="text-align: center; margin-top: 10px">JavaScript</h4>--}}
                        {{--<p class="description">{{ __('المادة 2 لكل إنسان حق التمتع بكافة الحقوق والحريات الواردة في هذا الإعلان، دون أي تمييز، كالتمييز بسبب العنصر أو اللون أو الجنس أو اللغة أو الدين أو الرأي السياسي أو أي رأي آخر، أو الأصل الوطني أو الإجتماعي أو الثروة أو الميلاد أو أي وضع آخر، دون أية تفرقة بين الرجال والنساء') }}</p>--}}
                        {{--<button class="btn btn-info btn-lg" style="border-radius: 10px; font-weight: bold; margin-top: 10px">عرض التفاصيل</button>--}}
                    {{--</div><hr style="height: 1px; background-color: darkgrey">--}}
                {{--</li>--}}
                {{--<li class="col-md-4" style="margin-top: 50px">--}}
                    {{--<img alt="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROIciAhXP-azLYvedLk1vQud7kD5ILpjltZQ&usqp=CAU" draggable="false" style="width: 80%; height: 200px">--}}
                    {{--<div class="details" style="color: black">--}}
                        {{--<h4 style="text-align: center; margin-top: 10px">HTML</h4>--}}
                        {{--<p class="description">{{ __('المادة 2 لكل إنسان حق التمتع بكافة الحقوق والحريات الواردة في هذا الإعلان، دون أي تمييز، كالتمييز بسبب العنصر أو اللون أو الجنس أو اللغة أو الدين أو الرأي السياسي أو أي رأي آخر، أو الأصل الوطني أو الإجتماعي أو الثروة أو الميلاد أو أي وضع آخر، دون أية تفرقة بين الرجال والنساء') }}</p>--}}
                        {{--<button class="btn btn-info btn-lg" style="border-radius: 10px; font-weight: bold; margin-top: 10px">عرض التفاصيل</button>--}}
                    {{--</div><hr style="height: 1px; background-color: darkgrey">--}}
                {{--</li>--}}
                {{--<li class="col-md-4" style="margin-top: 50px">--}}
                    {{--<img alt="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQi2f_yMish-StcLiljSPalc5KYLjMAH-Kn_w&usqp=CAU" draggable="false" style="width: 80%; height: 200px">--}}
                    {{--<div class="details" style="color: black">--}}
                        {{--<h4 style="text-align: center; margin-top: 10px">CSS</h4>--}}
                        {{--<p class="description">{{ __('المادة 2 لكل إنسان حق التمتع بكافة الحقوق والحريات الواردة في هذا الإعلان، دون أي تمييز، كالتمييز بسبب العنصر أو اللون أو الجنس أو اللغة أو الدين أو الرأي السياسي أو أي رأي آخر، أو الأصل الوطني أو الإجتماعي أو الثروة أو الميلاد أو أي وضع آخر، دون أية تفرقة بين الرجال والنساء') }}</p>--}}
                        {{--<button class="btn btn-info btn-lg" style="border-radius: 10px; font-weight: bold; margin-top: 10px">عرض التفاصيل</button>--}}
                    {{--</div><hr style="height: 1px; background-color: darkgrey">--}}
                {{--</li>--}}
                {{--<li class="col-md-4" style="margin-top: 50px">--}}
                    {{--<img alt="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-bzcvpLw3qBX2dMCNLv_3THBvzOxLa_fcaQ&usqp=CAU" draggable="false" style="width: 80%; height: 200px">--}}
                    {{--<div class="details" style="color: black">--}}
                        {{--<h4 style="text-align: center; margin-top: 10px">Bootstrap</h4>--}}
                        {{--<p class="description">{{ __('المادة 2 لكل إنسان حق التمتع بكافة الحقوق والحريات الواردة في هذا الإعلان، دون أي تمييز، كالتمييز بسبب العنصر أو اللون أو الجنس أو اللغة أو الدين أو الرأي السياسي أو أي رأي آخر، أو الأصل الوطني أو الإجتماعي أو الثروة أو الميلاد أو أي وضع آخر، دون أية تفرقة بين الرجال والنساء') }}</p>--}}
                        {{--<button class="btn btn-info btn-lg" style="border-radius: 10px; font-weight: bold; margin-top: 10px">عرض التفاصيل</button>--}}
                    {{--</div><hr style="height: 1px; background-color: darkgrey">--}}
                {{--</li>--}}
                {{--<li class="col-md-4" style="margin-top: 50px">--}}
                    {{--<img alt="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQoBQK-t2G81XbFoK2mseiMlgrSHUANXZkfQA&usqp=CAU" draggable="false" style="width: 80%; height: 200px">--}}
                    {{--<div class="details" style="color: black">--}}
                        {{--<h4 style="text-align: center; margin-top: 10px">JQuery</h4>--}}
                        {{--<p class="description">{{ __('المادة 2 لكل إنسان حق التمتع بكافة الحقوق والحريات الواردة في هذا الإعلان، دون أي تمييز، كالتمييز بسبب العنصر أو اللون أو الجنس أو اللغة أو الدين أو الرأي السياسي أو أي رأي آخر، أو الأصل الوطني أو الإجتماعي أو الثروة أو الميلاد أو أي وضع آخر، دون أية تفرقة بين الرجال والنساء') }}</p>--}}
                        {{--<button class="btn btn-info btn-lg" style="border-radius: 10px; font-weight: bold; margin-top: 10px">عرض التفاصيل</button>--}}
                    {{--</div><hr style="height: 1px; background-color: darkgrey">--}}
                {{--</li>--}}
            </ul>

            <ul class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12" style="background-color: white; opacity: 0.9; border-radius: 10px">
                {!! $online_classes->links() !!}
            </ul>
            {{--<div class="pagination">--}}
                {{--<a href="#">&laquo;</a>--}}
                {{--<a class="active" href="#">1</a>--}}
                {{--<a href="#">2</a>--}}
                {{--<a href="#">3</a>--}}
                {{--<a href="#">4</a>--}}
                {{--<a href="#">5</a>--}}
                {{--<a href="#">6</a>--}}
                {{--<a href="#">&raquo;</a>--}}
            {{--</div>--}}
        @else
            <h1 class="text-center text-default" style="font-size: 30px; margin-top: 3%"><u>لا توجد دورات تدريبية</u></h1>
        @endif
    </section>
@endsection