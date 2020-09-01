@extends('layouts.site')

@section('content')

@section('slider')
    <!-- Start Slider -->
    <div class="slider">
        <div class="container">

            <div class="row">
                <div class="col">
                    <div class="intro">
                        <span class="welcome">اهلا بِكَ فِي مَوْقِعِ مَكْتَبَةِ الدِّلْتَا الْمَرْكَزِيَّةِ.</span>
                        <h1>
                            بتدور علي
                            <a href="هتحط لينك الجاتيجوريز هني ياهشام علشان لو جيت تسالني ولقيتني مش فاتح واتس اب"
                                class="typewrite" data-period="2000" data-type='[ "كتاب", "محاضرة", "ملف PDF" ]'>
                                <span class="wrap"></span>
                            </a>
                            ؟
                        </h1>
                        <p>لـقد قمنـا بانشــاء هـذا الموقـع لاثــراء مــحـتـوي الـقــراء وللاحتفاظ بالمراجع وتحويل وتقدم
                            المحتوي باستخدام التكنولوجيا لمستقبل افضل ان شاء الله ونتمني لكم تجربة مفيدة وسعيدة ولذيذة واحلا
                            مسا..</p>
                        <button class="book-now">احجز الان</button>
                        @if (!student())
                            <a href='{{ route('login') }}' class="login">تسجيل الدخول</a>

                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="image">
                        <img data-tilt src="{{ asset('front') }}/images/undraw_book_lover_mkck.svg" alt="">
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

@if($best_books->count() > 0)


<section class="heading-section">
    <h2>قسم افضل الكتب</h2>
    <span>هتلاقي هني اهم واشهر الكتب اللي هتفيدك</span>
</section>


   <article class="books-section">
                <div class="container">

                    <div class="row">

                        @foreach ($best_books as $book)
                            <div class="col">
                                <div class="book-body">
                                    <div class="book-img">
                                        <a href="{{ route('book.show', $book->id) }}" style="text-decoration: none">

                                            <img src="{{ asset($book->photo) }}" alt="books" />
                                        </a>
                                    </div>
                                    <div class="book-info">
                                        <span class="category">{{ $book->category ? $book->category->name : '' }}</span>
                                        <h3 class="book-name">{{ $book->name }}</h3>
                                        @if ($book->active  && $book->parent_active)
                                            <span class="status status-yas">متاح</span>
                                        @else
                                            <span class="status status-no">غير متاح</span>
                                        @endif
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
                                            @if (student())
                                                {{-- <i class="heart-emptyicon- love"></i>
                                                --}}

                                                @if ($book->active  && $book->parent_active)

                                                    <a class="booking-btn" href="{{ route('book.show', $book->id) }}">حجز</a>

                                                @endif


                                            @elseif($book->active  && $book->parent_active)
                                                <a class="booking-btn" href="{{ route('login') }}">حجز</a>
                                            @endif




                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach




                    </div>
                </div>
            </article>


@endif
<!-- End Books -->


@endsection
