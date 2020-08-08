<?php

namespace App\Models\Admin;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Admin extends Authenticatable
{

    use Notifiable, HasRoles;

    protected $fillable = [
        "name",
        "email",
        "photo",
        "password",
    ];


    protected $hidden = ['password', 'remember_token'];





}
