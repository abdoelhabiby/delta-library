<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessageResponse extends Model
{
    protected $fillable = [
        "contact_id",
        "owner_body",
        "body",
    ];
}
