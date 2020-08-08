<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable =[
        "name",
        "active",
    ];


    public function getCaseActive()
    {
        return $this->active == 1 ? __("admin.enabled") : __("admin.not_enabled");
    }

    public function scopeSelection($query){
        return $query->select("name","id");
    }

    public function scopeActive($query){
       return $query->where("active",1);
    }

    public function books(){
        return $this->hasMany(Book::class,"category_id","id");
    }


}
