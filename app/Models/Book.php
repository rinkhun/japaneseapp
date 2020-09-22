<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "books";

    protected $fillable = [
        'name',
        'img',
        'category_id',
    ];

    protected $cats = [
        'id'=>'integer',
        'name'=>'string',
        'img'=>'string',
        'category_id'=>'integer',
    ];
}
