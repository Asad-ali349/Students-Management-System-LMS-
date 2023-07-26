<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class response_docs extends Model
{
    use HasFactory;
    protected $table="response_docs";
    protected $fillable=[
        'id','response_id','document','created_at','updated_at'
    ];
}
