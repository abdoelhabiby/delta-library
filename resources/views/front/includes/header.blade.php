<header>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}"><img class="logo" src="{{ asset('front') }}/images/logof.png"
                    alt="Logo">مكتبة الدلتا</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">الرئيسية <span class="sr-only">(current)</span></a>
                    </li>

                    {{-- ---------------------------------categories
                    ------------------------------ --}}
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ألاقسام
                        </a>
                        <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            @if (categoriesActive() && categoriesActive()->count() > 0)

                                @foreach (categoriesActive() as $category)
                                    <a class="dropdown-item" href="{{route('books') . '?category=' . $category->name}}">{{ $category->name }}</a>
                                @endforeach

                                <div class="dropdown-divider"></div>

                            @else

                            @endif

                            <a class="dropdown-item" href="{{route("books")}}">عام</a>
                        </div>


                    </li>
                    {{-- ---------------------------------end categories
                    ------------------------------ --}}
                    {{-- ---------------------------------account
                    ------------------------------ --}}
                    @if (student())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ student()->getFisrtName() }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}">تسجيل الخروج</a>
                                {{-- <a class="dropdown-item" href="#">حجز كتاب</a>
                                --}}

                            </div>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="dropdown-item" href="{{ route('login') }}">تسجيل الدخول</a>

                        </li>

                    @endif



                </ul>
                <form class="form-inline my-2 my-lg-0" action="{{route('books')}}">
                    <input class="form-control ml-sm-2" name="search" required value="{{request()->search ?? ''}}" type="search" placeholder="بتـدور علي اية؟" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">أبـحــث</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- end Navbar -->

    <!-- start slider -->
    {{-- because the designer make slider a chiled of parent header a7la qeno
    --}}
    @yield('slider')
    <!-- end slider -->

</header>
