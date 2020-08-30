<?php

namespace App\Observers;

use App\Models\Reservation;

class BookReservationObserver
{
    /**
     * Handle the reservation "created" event.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return void
     */
    public function created(Reservation $reservation)
    {
        $reservation->book()->update(['active' => 0]);
    }

    /**
     * Handle the reservation "updated" event.
     *
     * @param  \App\Reservation  $reservation
     * @return void
     */
    public function updated(Reservation $reservation)
    {
        $active = $reservation->active == 1 ? 0 : 1;
        $reservation->book()->update(['active' => $active]);
    }




}
