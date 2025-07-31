<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'id_admin',
        'id_user',
        'name',
        'address_admin',
        'gender',
    ];
}
