<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    use HasFactory;
    protected $table='courses';
    protected $fillable=[
        'id', 'name', 'description', 'course_fee','class_no','status', 'created_at', 'updated_at'
    ];
}
