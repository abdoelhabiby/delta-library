<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookReservationController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:edit_reservations')->except(['index', 'destroy']);
        $this->middleware('permission:read_reservations')->only(['index']);
        $this->middleware('permission:delete_reservations')->only(['destroy']);
    }
    //----------------------------------------------------------
    public function index()
    {
       $reservations = Reservation::with('student', 'book')->orderBy('id', 'desc')->get();

        return view('admin.reservations.index', compact('reservations'));
    }

    //----------------------------------------------------------
    public function receive_in(Reservation $reservation)
    {

        try {
            if (!$reservation->receive_in) {
                $date = date('Y-m-d', strtotime(Carbon::now()));
                $reservation->update(['receive_in' => $date]);

                return redirect(route("admin.reservations.index"))->with(['success' => __("admin.success create")]);
            }

            return redirect(route("admin.reservations.index"))->with(['error' => __("admin.message error")]);
        } catch (\Throwable $th) {
            return redirect(route("admin.reservations.index"))->with(['error' => __("admin.message error")]);
        }
    }

    //----------------------------------------------------------
    public function retrieved_in(Reservation $reservation)
    {

        try {
            if (!$reservation->retrieved_in) {
                $date = date('Y-m-d', strtotime(Carbon::now()));
                $reservation->update(['retrieved_in' => $date, 'active' => 0]);

                return redirect(route("admin.reservations.index"))->with(['success' => __("admin.success create")]);
            }

            return redirect(route("admin.reservations.index"))->with(['error' => __("admin.message error")]);
        } catch (\Throwable $th) {
            return redirect(route("admin.reservations.index"))->with(['error' => __("admin.message error")]);
        }
    }

    //----------------------------------------------------------

    public function active(Reservation $reservation)
    {
        try {

            if ($reservation->active == 1) {
                return redirect(route("admin.reservations.index"))->with(['error' => __("admin.message error")]);
            }

            $date = date('Y-m-d', strtotime(Carbon::now()));
            $reservation->update(['retrieved_in' => null, 'receive_in' => $date]);

            $reservation->update(['active' => 1]);

            return redirect(route("admin.reservations.index"))->with(['success' => __("admin.success create")]);
        } catch (\Throwable $th) {
            return redirect(route("admin.reservations.index"))->with(['error' => __("admin.message error")]);
        }
    }

    //----------------------------------------------------------

    public function destroy(Reservation $reservation)
    {

        try {

            if ($reservation->active == 1 && $reservation->receive_in ) {
                return redirect(route("admin.reservations.index"))->with(['error' => __("admin.message error")]);
            }

            $reservation->delete();

            return redirect(route("admin.reservations.index"))->with(['success' => __("admin.success delete")]);
        } catch (\Throwable $th) {
            return redirect(route("admin.reservations.index"))->with(['error' => __("admin.message error")]);
        }
    }


    //----------------------------------------------------------

} //end class
