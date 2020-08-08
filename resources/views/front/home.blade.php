@extends('layouts.site')

@section('content')

@section("slider")
  <!-- Start Slider -->
                <div class="slider">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="intro">
                                <span class="welcome">اهلا بِكَ فِي مَوْقِعِ مَكْتَبَةِ الدِّلْتَا الْمَرْكَزِيَّةِ.</span>
                                <h1>
                                    بتدور علي
                                    <a href="هتحط لينك الجاتيجوريز هني ياهشام علشان لو جيت تسالني ولقيتني مش فاتح واتس اب" class="typewrite" data-period="2000" data-type='[ "كتاب", "محاضرة", "ملف PDF" ]'>
                                        <span class="wrap"></span>
                                    </a>
                                    ؟
                                </h1>
                                <p>لـقد قمنـا بانشــاء هـذا الموقـع لاثــراء مــحـتـوي الـقــراء وللاحتفاظ بالمراجع وتحويل وتقدم المحتوي باستخدام التكنولوجيا لمستقبل افضل ان شاء الله ونتمني لكم تجربة مفيدة وسعيدة ولذيذة واحلا مسا..</p>
                                <button class="book-now">احجز الان</button>
                                <button class="login">تسجيل الدخول</button>
                            </div>
                        </div>
                        <div class="col">
                            <div class="image">
                                <img data-tilt src="{{asset("front")}}/images/undraw_book_lover_mkck.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
 </div>

            <!-- End Slider -->
@endsection

        <!-- Start About Us -->
           @include('front.includes.about_us')
        <!-- End About Us -->

        <!-- Start books -->
        <section class="heading-section">
            <h2>قسم افضل الكتب</h2>
            <span>هتلاقي هني اهم واشهر الكتب اللي هتفيدك</span>
        </section>
        <article class="books-section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="book-body">
                            <div class="book-img">
                                <img src="{{asset("front")}}/images/books/must-read-html-css-books.jpg" alt="books" />
                            </div>
                            <div class="book-info">
                                <span class="category">قسم تاريخ</span>
                                <h3 class="book-name">كتاب حلو بس مجهد</h3>
                                <span class="status status-yas">مــتاح</span>
                            </div>
                            <div class="book-details">
                                <div class="stars">
                                    <i class="staricon-"></i>
                                    <i class="staricon-"></i>
                                    <i class="staricon-"></i>
                                    <i class="staricon-"></i>
                                    <i class="staricon-"></i>
                                </div>
                                <div class="booking">
                                    <i class="heart-emptyicon- love"></i>
                                    <a class="booking-btn" href="#">حجز</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="book-body">
                            <div class="book-img">
                                <img src="{{asset("front")}}/images/books/must-read-html-css-books.jpg" alt="books" />
                            </div>
                            <div class="book-info">
                                <span class="category">قسم الهكر</span>
                                <h3 class="book-name">الدرر المنسيه في اختراق سرفرات الكلية</h3>
                                <span class="status status-no">غير متاح</span>
                            </div>
                            <div class="book-details">
                                <div class="stars">
                                    <i class="staricon-"></i>
                                    <i class="staricon-"></i>
                                    <i class="staricon-"></i>
                                    <i class="staricon-"></i>
                                    <i class="star-emptyicon-"></i>
                                </div>
                                <div class="booking">
                                    <i class="heart-emptyicon- love"></i>
                                    <a class="booking-btn" href="#">حجز</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="book-body">
                            <div class="book-img">
                                <img src="{{asset("front")}}/images/books/must-read-html-css-books.jpg" alt="books" />
                            </div>
                            <div class="book-info">
                                <span class="category">تطبيقات الانترنت</span>
                                <h3 class="book-name">الانتيم للتعليم</h3>
                                <span class="status status-no">غير متاح</span>
                            </div>
                            <div class="book-details">
                                <div class="stars">
                                    <i class="staricon-"></i>
                                    <i class="staricon-"></i>
                                    <i class="star-emptyicon-"></i>
                                    <i class="star-emptyicon-"></i>
                                    <i class="star-emptyicon-"></i>
                                </div>
                                <div class="booking">
                                    <i class="heart-emptyicon- love"></i>
                                    <a class="booking-btn" href="#">حجز</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </article>
        <!-- End Books -->


@endsection
