@extends('layouts.site')

@section('content')
    {{--Start Carousel--}}
    @if(isset($home_section))
        <div class="hero-wrap js-fullheight" style="background-image: url('{{$home_section->photo}}');"
             data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                     data-scrollax-parent="true">
                    <div dir="rtl" class="col-xl-10 ftco-animate">
                        <h1 style="font-weight: bold; color: #4d4d4d" class="mb-4">
                            {{$home_section->title_1}}
                            <br><span style="font-weight: normal">
                                {{$home_section->title_2}}
                            </span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{--End Carousel--}}

    {{-- Start  contact-us   Short   --}}
    <section class="contact">
        <div class="container">
            <div class="row wow">
                <div class="col-sm-4 text-center">
                    <a href="#section-contact">
                        <button> اتـصـل بـنـا</button>
                    </a>
                </div>
                <div class="col-sm-8 col-xs-12 wow fadeIn small-contact-div">
                    <h2>أدق خـدمـة في أسـرع وقـت وأفـضـل جـودة وأقـل سـعـر </h2>
                </div>
            </div>
        </div>
    </section>
    {{-- End  contact-us    Short     --}}


    {{--    Start About us--}}
    @if(isset($about_us_section))
        <section class="ftco-counter img" id="section-about" style="margin-top: 20px">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-6 d-flex">
                        <div class="img d-flex align-self-stretch"
                             style="background-image:url({{$about_us_section->photo}});"></div>
                    </div>
                    <div class="col-md-6 pl-md-5 py-5">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate text-center">
                                <h2 class="mb-1">من نحن ؟</h2>
                                <div class="line2" style="margin-top: 5px"></div>
                                <p dir="rtl" style="font-size: 21px">
                                    {{$about_us_section->content}}
                                </p>
                                @if(isset($about_us_cards) && $about_us_cards->count() > 0)
                                    <div class="row" style="margin-top: 50px">
                                        @foreach($about_us_cards as $about_us_card)
                                            <div
                                                class="card d-inline-block  {{$about_us_cards->count() > 1 ? 'col-md-5' : 'col-md-10'}} m-3"
                                                style="border: black 2px solid">
                                                <div style="padding-top: 10px">
                                                    <img src="{{$about_us_card->title == "الرؤية" ?
                                                    asset('assets/front/images/eye.png') : asset('assets/front/images/email.png')}}"
                                                         alt="test" width="60"
                                                         height="60">
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title" style="font-size: 25px; font-weight: bold">
                                                        {{$about_us_card->title}}</h5>
                                                    <p class="card-text">
                                                        {{$about_us_card->content}}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line">

                </div>
            </div>
        </section>
    @endif
    {{--   End About us--}}


    {{--Start Gallery--}}
    @if(isset($gallery) && $gallery->count() > 0)
        <section class="text-center mt-5" id="section-gallery">
            <div class="container">
                <h2 class="mb-1" style="font-size: 40px;font-weight: bold">أعـمـالنـا</h2>
                <div class="line2" style="margin-top: 5px"></div>


                <div class="row">
                    @foreach($gallery as $image)
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                               data-image="{{$image->photo}}"
                               data-target="#image-gallery">
                                <img class="img-thumbnail"
                                     src="{{$image->photo}}"
                                     alt="Another alt text">
                            </a>
                        </div>
                    @endforeach
                    <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="image-gallery-title"></h4>
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">×</span><span class="sr-only">Close</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary float-left" id="show-previous-image">
                                        <i
                                            class="fa fa-arrow-left"></i>
                                    </button>

                                    <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i
                                            class="fa fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line">

                </div>
            </div>
        </section>
    @endif
    {{--    End Gallery--}}


    {{--    Start Goals--}}
    @if(isset($goals) && $goals->count() > 0)
        <section class="ftco-counter img" id="section-goals" style="margin-top: 20px">
            <div class="container">
                <div class="row d-flex">
                    @if(isset($goal_photo))
                        <div class="col-md-6 d-flex">
                            <div class="img d-flex align-self-stretch"
                                 style="background-image:url({{$goal_photo->photo}}); border: 2px black solid"></div>
                        </div>
                    @endif
                    <div class="col-md-6 pl-md-5 py-5">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate text-center">
                                <h2 class="mb-1">الأهـداف</h2>
                                <div class="line2" style="margin-top: 5px"></div>
                                <div style="line-height: 30px">
                                    @foreach($goals as $goal)
                                        <p dir="rtl" style="font-size: 21px;text-align: right">
                                            {{$goal->content}}
                                        </p>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="line">

                </div>
            </div>
        </section>
    @endif
    {{--    End Goals--}}


    {{--    Start Commitment--}}
    @if(isset($commit_items) && $commit_items->count() > 0)
        <section class="ftco-counter img" id="section-commit" style="margin-top: 20px">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-12 py-2">
                        <div class="justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate text-center">
                                <h2 class="mb-1">قـيـم الـمـؤسـسـة</h2>
                                <div class="line2" style="margin-top: 5px"></div>

                                <div class="row" style="align-content: center; display: inline-block">
                                    @foreach($commit_items as $commit_item)
                                        <div class="card d-inline-block col-md-5 m-3" style="border: black 2px solid">
                                            <div style="padding-top: 10px">
                                                <img
                                                    src="{{$commit_item->title == 'الإلتزام' ?  asset('assets/front/images/commit.png') : asset('assets/front/images/cred.png')}}"
                                                    alt="test" width="60"
                                                    height="60">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"
                                                    style="font-size: 25px; font-weight: bold">{{$commit_item->title}}</h5>
                                                <p class="card-text">
                                                    {{$commit_item->content}}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="line">

                </div>
            </div>
        </section>
    @endif
    {{--    End Commitment--}}

    {{--    Start Services--}}
    @if(isset($services) && $services->count() > 0)
        <section class="ftco-counter img" id="section-services" style="margin-top: 20px">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-12 heading-section text-center">
                        <h2 class="mb-1">الخدمات</h2>
                        <div class="line2" style="margin-top: 5px"></div>

                    </div>
                    @foreach($services as $service)
                        <div class="col-md-12 pl-md-5 py-5">
                            <div class="row justify-content-start pb-3">
                                <div class="col-md-6 heading-section ftco-animate text-center">

                                    <h2 class="mb-1">{{$service -> title}}</h2>
                                    <div class="line2" style="margin-top: 5px"></div>

                                    <p dir="rtl" style="font-size: 19px;text-align: right">
                                        {{$service->content}}
                                    </p>

                                </div>
                                <div class="col-md-6 d-flex">
                                    <div class="img d-flex align-self-stretch"
                                         style="background-image:url({{$service->photo}});border: black 2px solid"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
            <div class="line">

            </div>
            </div>
        </section>
    @endif
    {{--    End Services--}}


    {{--    Start Why us--}}
    @if(isset($why_us) && $why_us->count() > 0)
        <section class="ftco-counter img" id="section-why-us" style="margin-top: 20px">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-12 pl-md-2 py-2">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate text-center">
                                <h2 class="mb-1">لماذا نحن ؟</h2>
                                <div class="line2" style="margin-top: 5px"></div>

                                <div class="row" style=" display: inline-block">
                                    <p dir="rtl" style="font-size: 21px;text-align: right">

                                        {{$why_us->content}}
                                    </p>
                                    @if(isset($why_us_reasons) && $why_us_reasons->count() > 0)
                                        <div style="font-size: 21px;text-align: right; line-height: 16px">
                                            @foreach($why_us_reasons as $why_us_reason)
                                                <p dir="rtl" class="text-right mr-5">
                                                    {{$why_us_reason->reason}}
                                                </p>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="line">

                </div>
            </div>
        </section>
    @endif
    {{--    End Why us--}}


    {{--    Start Contact us--}}
    @if(isset($contacts) && $contacts-> count() > 0)
        <section class="ftco-counter img" id="section-contact" style="margin-top: 20px">
            <div class="container">
                <div class="row d-flex">

                    <div class="col-md-12 pl-md-1 heading-section py-2 text-center">
                        <h2 class="mb-1">اتصل بنا</h2>
                        <div class="line2" style="margin-top: 5px"></div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="img d-flex align-self-stretch"
                             style="background-image:url({{asset('assets/front/images/contact.jpg')}});border: 2px black solid; border-radius: 3px"></div>
                    </div>
                    <div class="col-md-6 pl-md-5 py-5">
                        <div class="row justify-content-start pb-3">
                            <div dir="rtl" class="col-md-12 heading-section ftco-animate text-right"
                                 style="line-height: 23px">
                                <div>
                                    <p style="font-size: 20px;text-align: right">نرحب بتساؤلاتكم واستفساراتكم عبر قنوات
                                        الاتصال التالية:</p>
                                </div>
                                @foreach($contacts as $contact)
                                    <div class="item">
                                        <div class="{{$contact->title}} d-inline-block ml-3" style="color: #9c992c;">
                                        </div>
                                        <div dir="rtl" class=" d-inline-block"
                                             style="font-size: 20px;text-align: right">

                                            @if($contact->title == 'icon-instagram')
                                                <a href="{{$contact->url}}">صفحتنا علي انستغرام</a>
                                            @else
                                                {{$contact->url}}
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                <br>
                                <div class="location">
                                    <p dir="rtl" class=" d-inline-block" style="font-size: 20px;text-align: right">
                                        كما نتشرف بدعوة عملائنا الكرام إلى زيارة مقر المؤسسة في العنوان التالي:
                                    </p>
                                    <p dir="rtl" class=" d-inline-block" style="font-size: 20px;text-align: right">
                                        السعودية المنطقة الشرقية مدينة سيهات شارع الخليج حي النسيم. مؤسسة FDF نتقن
                                        ونبدع.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="line">

                </div>
            </div>
        </section>
    @endif
    {{--    End Contact us--}}


    {{--    Start Success--}}
    <section class="ftco-counter img mt-5 mb-5" id="section-counter">
        <div class="container">
            <div class="row d-flex">

                <div class="col-md-6 pl-md-5" dir="rtl">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate text-center">
                            <h2 class="mb-4">Some Success</h2>
                            <div class="line2" style="margin-top: 5px"></div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center py-4 bg-light mb-4">
                                <div class="text">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="flaticon-guest"></span>
                                    </div>
                                    <strong class="number" data-number="300">0</strong>
                                    <span>Sponsor</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center py-4 bg-light mb-4">
                                <div class="text">
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="flaticon-handshake"></span>
                                    </div>
                                    <strong class="number" data-number="30000">0</strong>
                                    <span>Clients</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="img d-flex align-self-stretch"
                         style="background-image:url({{asset('assets/front/images/success.jpg')}});"></div>
                </div>
            </div>

        </div>
    </section>
    {{--    End Success--}}

@stop

@section('script')

@stop
