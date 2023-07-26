<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quiz_responses extends Model
{
    use HasFactory;
    protected $table='quiz_responses';
    protected $fillable=[
        'id', 'quiz_id', 'student_id', 'total_marks', 'obtain_marks', 'answer','status', 'created_at', 'updated_at'
    ];
    public function quiz_detail()
    {
        return $this->belongsTo(quiz::class,'quiz_id');
    }
    public function student_detail()
    {
        return $this->belongsTo(student::class,'student_id');
    }
    public function response_docs()
    {
        return $this->hasMany(response_docs::class,'response_id');
    }
}
