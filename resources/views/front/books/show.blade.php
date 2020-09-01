@extends('layouts.site')
@section('title')
    | الكتب| {{ $book->name }}
@endsection
@section('content')



    <article class="books-section">
        <div class="container">




            <div class="row">

                <div class="col-md-6">
                        <div class="book-body">
                            <div class="book-img">
                                <img src="{{ asset($book->photo) }}" alt="books" />
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
                                    {{-- @if (student() && student()->active)
                                        <i class="heart-emptyicon-"></i>
                                    @endif --}}


                                </div>
                            </div>
                        </div>
                </div>

                <div class="col-md-6 ">
                    <h3 class="text-center">نبذه عن الكتاب</h3>
                    <p class="float-right">
                        {{ $book->description }}
                    </p>
                    <div class="clearfix"></div>


                </div>

                @if ($book->active  && $book->parent_active)
                    @if (student())
                        <form action="{{ route('books.reservation', $book->id) }}" method="post">
                            @csrf
                           <button type="submit" class='btn btn-success'>تأكيد الحجز</button>
                        </form>

                    @endif

                    @guest
                        <a class='btn btn-success' href="{{ route('login') }}"> احجز</a>

                    @endguest
                @endif

            </div>

        </div>
    </article>









@endsection
