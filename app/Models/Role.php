<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    // Id of roles in database
    public const IS_ADMIN = 1;
    public const IS_USER = 2;

}
