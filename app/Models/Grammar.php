<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grammar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'mean',
        'using',
        'lesson_id',
    ];

    protected $cats = [
        'id'=>'integer',
        'title'=>'string',
        'mean'=>'string',
        'using'=>'string',
        'lesson_id'=>'integer',
       
    ];
}
