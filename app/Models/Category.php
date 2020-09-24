<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
    ];

    protected $cats = [
        'id'=>'integer',
        'name'=>'string',
        'icon'=>'string', 
    ];

    public function book(){
        return $this->hasMany('App\Models\Book');
    }
}
