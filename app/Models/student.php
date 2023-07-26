<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class student extends Authenticatable
{
    use HasFactory;
    protected $table='student';
    protected $fillable=[
        'id', 'name', 'email','password','father_name', 'father_phone', 'class_no', 'phone', 'address', 'total_fee', 'status', 'created_at', 'updated_at'
    ];
    public function enrolled_courses()
    {
        return $this->hasMany('App\Models\course_enrollment');
    }
    public function quiz_responses()
    {
        return $this->hasMany('App\Models\quiz_responses');
    }
    public function invoices()
    {
        return $this->hasMany('App\Models\invoice');
    }
}
