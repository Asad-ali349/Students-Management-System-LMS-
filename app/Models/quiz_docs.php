<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quiz_docs extends Model
{
    use HasFactory;
    protected $table="quiz_docs";
    protected $fillable=[
        'id','quiz_id','document','created_at','updated_at'
    ];
}
