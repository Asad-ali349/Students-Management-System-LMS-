<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    protected $table='invoice';
    protected $fillable=[
        'id', 'student_id', 'total_fee', 'due_date', 'paid_date', 'status', 'created_at', 'updated_at'
    ];
    public function student_detail()
    {
        return $this->belongsTo(student::class,'student_id');
    }
}
