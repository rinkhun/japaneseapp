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
        'id' => 'integer',
        'name' => 'string',
        'img' => 'string',
        'category_id' => 'integer',
    ];

    public static $create_rule = [
        'name' => 'required|string',
        'img' => 'required|file',
        'category_id' => 'required',
    ];

    public static $edit_rule = [
        'name' => 'required|string',
        // 'img' => 'required|file',
    ];
   


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($book) {
            $book->lessons()->delete();
        });
    }
}
