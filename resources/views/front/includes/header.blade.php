<header>
            <!-- Start Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#"><img class="logo" src="{{asset("front")}}/images/logof.png" alt="Logo">مكتبة الدلتا</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">الرئيسية <span class="sr-only">(current)</span></a>
                            </li>

{{-- ---------------------------------categories ------------------------------ --}}
                            <li class="nav-item dropdown">


                                    @if(categoriesActive() && categoriesActive()->count() > 0)
                                         <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                ألاقسام
                                         </a>
                                        <div class="dropdown-menu" aria-labelledby="categoriesDropdown">

                                       @foreach(categoriesActive() as $category)
                                            <a class="dropdown-item" href="#">{{$category->name}}</a>
                                       @endforeach

                                       <div class="dropdown-divider"></div>
                                       <a class="dropdown-item" href="#">عام</a>
                                        </div>
                                        @else
                                         <a class="nav-link disabled" >
                                            ألاقســام
                                        </a>
                                    @endif


                            </li>
{{-- ---------------------------------end categories ------------------------------ --}}
{{-- ---------------------------------account ------------------------------ --}}

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    حســابـك
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="login.html">تسجيل الدخول</a>
                                    <a class="dropdown-item" href="#">حجز كتاب</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">الدعم الفني</a>
                                </div>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control ml-sm-2" type="search" placeholder="بتـدور علي اية؟" aria-label="Search">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">أبـحــث</button>
                        </form>
                    </div>
                </div>
            </nav>
            <!-- end Navbar -->

            <!-- start slider -->
{{-- because the designer make slider a chiled of parent header a7la qeno --}}
                @yield('slider')
            <!-- end slider -->

        </header>
