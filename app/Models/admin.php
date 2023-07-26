<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Contracts\Auth\MustVerifyEmail;
class admin extends Authenticatable
{
    use HasFactory;
    protected $table='admin';
    protected $fillable=[
        'id', 'name', 'email', 'password', 'phone','image', 'street','city','state','zip','counrty', 'created_at', 'updated_at'
    ];
}
