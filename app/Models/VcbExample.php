<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VcbExample extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'vocabulary_id',
        'examples',
    ];

    protected $cats = [
        'id' => 'integer',
        'vocabulary_id' => 'integer',
        'examples' => 'string',
    ];
}
