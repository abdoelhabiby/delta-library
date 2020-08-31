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

            return redirect()->route('student.books')->with(['success' => ' تم الحجز يرجي التوجه للمكتبه لاستلام الكتاب خلال ثلاثه ايام والا سيتم الغاء الحجز']);

        } catch (\Throwable $ex) {

            return redirect()->back()->with(['error' => 'حدث خطأ يرجي المحاوله في وقت لاحق']);
        }
    }


    public function books()
    {

        try {
            $reservations = Reservation::with(['book'])->where('student_id', student()->id)->orderBy('id', 'desc')->paginate(PAGINATE_COUNT);
            return view('front.students.books', compact('reservations'));


        } catch (\Throwable $th) {


            return redirect()->route('home')->with(['error' => 'حدث خطأ يرجي المحاوله في وقت لاحق']);

        }


    }


    public function reservationCancel (Reservation $reservation)
    {


        try {

             if($reservation->student_id != student()->id){
                return redirect()->back();
             }


             if($reservation->active && $reservation->receive_in == null && $reservation->retrieved_in == null){
                $reservation->delete();
                return redirect()->route('student.books')->with(['success' => 'تم الغاء الحجز']);

             }


            return redirect()->route('student.books')->with(['error' => 'حدث خطأ يرجي المحاوله في وقت لاحق']);







        } catch (\Throwable $th) {


            return redirect()->route('student.books')->with(['error' => 'حدث خطأ يرجي المحاوله في وقت لاحق']);

        }
    }

}
