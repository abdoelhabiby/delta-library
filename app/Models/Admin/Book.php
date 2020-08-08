<?php

namespace App\Models\Admin;

use App\Models\Admin\Category;
use App\Observers\BookObserver;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        Book::observe(BookObserver::class);
    }

    public function getCaseActive()
    {
        return $this->active == 1 ? __("admin.enabled") : __("admin.not_enabled");
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

}
