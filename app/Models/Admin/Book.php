<?php

namespace App\Models\Admin;

use App\Models\Admin\Category;
use App\Models\Reservation;
use App\Observers\BookObserver;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];



    public function getCaseActive()
    {
        return $this->active == 1 ? __("admin.enabled") : __("admin.not_enabled");
    }

    public function getParrentCaseActive()
    {
        return $this->parent_active == 1 ? __("admin.enabled") : __("admin.not_enabled");
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }


    public function reservationActive()
    {
        return $this->hasOne(Reservation::class,'book_id','id')->where('active',1);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class,'book_id', 'id');
    }


}
