<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use Notifiable;

    protected $table = 'account';
    protected $primaryKey = 'username';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'password', 'name', 'role',
    ];
}
