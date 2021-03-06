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
        'id' => 'integer',
        'name' => 'string',
        'icon' => 'string',
    ];

    public static $create_rule = [
        'name' => 'required|string',
        'icon' => 'required|file',
    ];

    public static $update_rule = [
        'name' => 'required|string',
    ];

    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->books()->delete();
        });
    }
}
