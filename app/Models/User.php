<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class User extends Model
class User extends Authenticatable
{
    // protected $fillable = [
    //     'username',
    //     'password',
    //     'fio',
    //     'email',
    // ];

    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value);
    // }
       
    // use Illuminate\Contracts\Auth\MustVerifyEmail;
    // use Illuminate\Database\Eloquent\Factories\HasFactory;
    // use Laravel\Sanctum\HasApiTokens;
    // use Illuminate\Foundation\Auth\User as Authenticatable;
    // use Illuminate\Notifications\Notifiable;
    
    use HasFactory;
}
