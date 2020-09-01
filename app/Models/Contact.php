<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        "name",
        "email",
       // "message",
        //"response",
        "was_answered_in",
    ];


    public function messageResponses()
    {
        return $this->hasMany(ContactMessageResponse::class,'contact_id','id');
    }


}
