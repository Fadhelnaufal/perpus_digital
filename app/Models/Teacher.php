<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'id_teacher',
        'id_user',
        'name',
        'address_teacher',
        'gender',
    ];
}
