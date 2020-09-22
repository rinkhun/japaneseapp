<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'leeson_id',
        'user_id',
        'sel_content',
    ];

    protected $cats = [
        'id' => 'integer',
        'leeson_id' => 'integer',
        'user_id' => 'integer',
        'sel_content' => 'string',
    ];
}
