<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    use HasFactory;
    protected $table='quiz';
    protected $fillable=[
        'id', 'name', 'description', 'course_id', 'question_document', 'total_marks', 'total_time', 'status', 'created_at', 'updated_at'
    ];
    public function course_detail()
    {
        return $this->belongsTo(courses::class,'course_id');
    }
    public function quiz_docs()
    {
        return $this->hasMany('App\Models\quiz_docs');
    }
}
