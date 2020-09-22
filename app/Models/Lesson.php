<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'description',
        'book_id',
    ];

    protected $cats = [
        'id' => 'integer',
        'name' => 'string',
        'img' => 'string',
        'description' => 'string',
        'book_id'=>'integer',
    ];
}
