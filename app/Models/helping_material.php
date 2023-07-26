<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class helping_material extends Model
{
    use HasFactory;
    protected $table="helping_material";
    protected $fillable=[
        'id','course_id','description','created_at','updated_at'
    ];
    public function helping_material_docs()
    {
        return $this->hasMany(helping_material_docs::class, 'helping_material_id');
    }
    public function course_detail()
    {
        return $this->belongsTo(courses::class, 'course_id');
    }
}
