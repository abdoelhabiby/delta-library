<?php

namespace App\Models\Admin;

use App\Models\Reservation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'student_id','active','level','photo','phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */



    public function scopeActive($query)
    {
        return $query->where("active", 1);
    }

    public function getCaseActive()
    {
        return $this->active == 1 ? __("admin.enabled") : __("admin.not_enabled");
    }


    public function getFisrtName()
    {
        $fisrt_name = explode(' ', $this->full_name);
        return $fisrt_name[0];
    }


    public function reservations()
    {
        return $this->hasMany(Reservation::class,'student_id','id');
    }

    public function reservationActive()
    {
        return $this->hasOne(Reservation::class, 'student_id', 'id')->where('active', 1);
    }



    public function books()
    {
        return $this->belongsToMany(Book::class,'reservations','student_id','book_id')->withPivot([
            'receive_in',
            'retrieved_in',
            'active'
        ]);
    }




}
