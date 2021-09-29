<!--start of footer  2  -->
<footer class="hidden-xs text-center last-part" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-about wow fadeIn">
                    <h3>شركة FDF</h3>
                    {{--                            line  Here--}}
                    <div class="line2">
                    </div>
                    <p style="color: white; line-height: 25px; margin-top: -15px">مؤسسة FDF متخصصة في الديكور وأعمال
                        التصميم، يقع مقرنا الرئيس في المنطقة الشرقية – المملكة العربية السعودية. نتملك خبرة طويلة في
                        مجال الديكورات ونقدم باقة من الخدمات المميزة التي تلبي حاجة عملائنا؛ والتي تضم: (التصميم
                        الداخلي، والتصميم الخارجي، وتصميم الحدائق، والتنفيذ والإشراف)</p>
                </div>
            </div>
            @if(isset($contacts) && $contacts->count() > 0)
            <div class="col-md-4">
                <div class="footer-contact wow fadeIn">
                    <h3>اتصل بنا</h3>
                    {{--                            line  Here--}}
                    <div class="line2">
                    </div>
                    <div style="margin-top: -15px; line-height: 20px">
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
                    </div>
                </div>
            </div>
            @endif
            <div class="col-md-4">
                <div class="footer-menu wow fadeIn">
                    <h3>القائمة</h3>
                    {{--                            line  Here--}}
                    <div class="line2">

                    </div>

                    <div style="margin-top: -15px; line-height: 20px">
                        <a href="{{route('site.home')}}">الصفحة الرئيسية</a><br>
                        <a href="#section-about">من نحن ؟</a><br>
                        <a href="#section-gallery">أعمالنا</a><br>
                        <a href="#section-goals">الأهداف</a><br>
                        <a href="#section-services">الخدمات</a><br>
                        <a href="#section-why-us">لماذا نحن ؟</a><br>
                        <a href="#section-contact">اتصل بنا</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>
<!--end of footer-->
