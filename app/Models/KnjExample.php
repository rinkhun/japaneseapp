<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnjExample extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'kanji',
        'hiragana',
        'mean',
        'kanji_id',
    ];

    protected $cats = [
        'id' => 'integer',
        'kanji' => 'string',
        'hiragana' => 'string',
        'mean' => 'string',
        'kanji_id'=>'integer',
    ];  
}
