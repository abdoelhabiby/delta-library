<?php

namespace App\Observers;

use App\Models\Admin\Book;

class BookObserver
{
    /**
     * Handle the book "created" event.
     *
     * @param  \App\Models\Admin\Book  $book
     * @return void
     */
    public function created(Book $book)
    {
        //
    }

    /**
     * Handle the book "updated" event.
     *
     * @param  \App\Models\Admin\Book  $book
     * @return void
     */
    public function updated(Book $book)
    {

    }

    /**
     * Handle the book "deleted" event.
     *
     * @param  \App\Models\Admin\Book  $book
     * @return void
     */
    public function deleted(Book $book)
    {
        //
    }

    /**
     * Handle the book "restored" event.
     *
     * @param  \App\Models\Admin\Book  $book
     * @return void
     */
    public function restored(Book $book)
    {
        //
    }

    /**
     * Handle the book "force deleted" event.
     *
     * @param  \App\Models\Admin\Book  $book
     * @return void
     */
    public function forceDeleted(Book $book)
    {
        //
    }
}
