<?php

namespace App\Http\Controllers\Front;

use App\Models\Admin\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;


class BookReservationController extends Controller
{

    public function store(Book $book)
    {
        try {


            if (!student()->active || !$book->active) {
                return redirect()->back()->with(['error' => 'حدث خطأ يرجي المحاوله في وقت لاحق']);
            }

            $reservation = new Reservation();

            $reservation->book()->associate($book);

            student()->reservations()->save($reservation);

            return redirect()->back()->with(['success' => ' تم الحجز يرجي التوجه للمكتبه لاستلام الكتاب خلال.....']);

        } catch (\Throwable $ex) {

            return redirect()->back()->with(['error' => 'حدث خطأ يرجي المحاوله في وقت لاحق']);
        }
    }

}
