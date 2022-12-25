<?php

namespace DD4You\Dpanel\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dpanel extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
