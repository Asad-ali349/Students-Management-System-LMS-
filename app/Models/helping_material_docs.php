<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class helping_material_docs extends Model
{
    use HasFactory;
    protected $table="helping_material_docs";
    protected $fillable=[
        'id','helping_material_id','document','created_at','updated_at'
    ];
}
