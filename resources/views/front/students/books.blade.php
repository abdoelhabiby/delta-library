@extends('layouts.site')
@section('title')
    | كتبي
@endsection
@section('content')


    @isset($reservations)
        @if ($reservations->count() > 0)

            <article class="books-section">
                <div class="container">
                    @include('front.includes.alerts.errors')
                    @include('front.includes.alerts.success')
                    <div class="row">

                        @foreach ($reservations as $reservation)
                            <div class="col">
                                <div class="book-body">
                                    <div class="book-img">
                                        <a href="{{ route('book.show', $reservation->book->id) }}"
                                            style="text-decoration: none">

                                            <img src="{{ asset($reservation->book->photo) }}" alt="books" />
                                        </a>
                                    </div>
                                    <div class="book-info">
                                        <span
                                            class="category">{{ $reservation->book->category ? $reservation->book->category->name : '' }}</span>
                                        <h3 class="book-name">{{ $reservation->book->name }}</h3>

                                    </div>
                                    <div class="book-details">

                                        <div class="booking">

                                            @if ($reservation->getCaseReservation() == 'cancel')
                                                <form method='post'
                                                    action="{{ route('student.reservation.cancel', $reservation->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">الغاء الحجز</button>
                                                </form>

                                            @else
                                                {{$reservation->getCaseReservation()}}

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

            {{ $reservations->appends(request()->query())->links() }}

        </div>
    @endisset







@endsection
