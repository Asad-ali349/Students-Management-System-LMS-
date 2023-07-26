<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_enrollment extends Model
{
    use HasFactory;
    protected $table='course_enrollment';
    protected $fillable=[
        'id', 'student_id', 'course_id','class_no','status', 'created_at', 'updated_at'
    ];

    public function course()
    {
        return $this->belongsTo(courses::class,'course_id');
    }
    public function student()
    {
        return $this->belongsTo(student::class,'student_id');
    }
}
