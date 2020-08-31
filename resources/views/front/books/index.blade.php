@extends('layouts.site')
@section('title')
    | الكتب
@endsection
@section('content')


    @isset($books)
        @if ($books->count() > 0)

            <article class="books-section">
                <div class="container">
                    @include('front.includes.alerts.errors')
                    @include('front.includes.alerts.success')
                    <div class="row">

                        @foreach ($books as $book)
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
                                        @if ($book->active == 1)
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

                                                @if ($book->active == 1)

                                                    <a class="booking-btn" href="{{ route('book.show', $book->id) }}">حجز</a>

                                                @endif


                                            @elseif($book->active == 1)
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

        @else
            <div class="d-flex justify-content-center mt-5">
                <h2> لا يوجد كتب ...... </h2>
            </div>
        @endif

        <div class="d-flex justify-content-center mt-5">

            {{ $books->appends(request()->query())->links() }}

        </div>
    @endisset







@endsection
