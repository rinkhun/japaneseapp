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
        'book_id' => 'integer',
    ];

    public function book()
    {
        return $this->belongsTo('App\Models\Book');
    }

    public function grammars()
    {
        return $this->hasMany('App\Models\Grammar');
    }

    public function vocabularies()
    {
        return $this->hasMany('App\Models\Vocabulary');
    }

    public function exercises()
    {
        return $this->hasMany('App\Models\Exercise');
    }

    public function kanjis()
    {
        return $this->hasMany('App\Models\Kanji');
    }

    public function histories()
    {
        return $this->hasMany('App\Models\History');
    }

    public function conversations()
    {
        return $this->hasMany('App\Models\Conversation');
    }


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($lesson) {
            $lesson->grammars()->delete();

            $lesson->vocabularies()->delete();  

            $lesson->exercises()->delete();

            $lesson->kanjis()->delete();

            $lesson->conversations()->delete();

            $lesson->histories()->delete();
        });
    }
}
