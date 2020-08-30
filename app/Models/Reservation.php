<?php

namespace App\Models;

use App\Models\Admin\Book;
use App\Models\Admin\Student;
use Illuminate\Database\Eloquent\Model;
use App\Observers\BookReservationObserver;

class Reservation extends Model
{


    protected $fillable= ['receive_in', 'retrieved_in', 'active'];

    public static function boot()
    {
        parent::boot();
        Reservation::observe(BookReservationObserver::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class,'book_id','id');
    }


    public function getCaseActive()
    {
        return $this->active == 1 ? __("admin.enabled") : __("admin.not_enabled");

    }


}
