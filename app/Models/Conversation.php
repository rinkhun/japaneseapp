<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'actor',
        'gender',
        'order_no',
        'lesson_id',
    ];

    protected $cats = [
        'id' => 'integer',
        'content'=>'string',
        'actor'=>'string',
        'gender'=>'string',
        'order_no'=>'string',
        'lesson_id'=>'integer',
    ];
}
