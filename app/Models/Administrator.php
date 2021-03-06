<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Administrator extends  Authenticatable
{
    use HasFactory;


    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hiden = [

        'password' => 'string',
    ];

    protected $cats = [
        'id' => 'integer',
        'name' => 'string',
        'password' => 'string',
    ];

    public static  $rule_login=[
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
    ];
}
