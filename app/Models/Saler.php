<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saler extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'entry_date',
        'qrcode',
        'birthday',
        'email',
    ];

    protected $hidden = [
       
        'password',
    ];

    protected $cats = [
        'id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'entry_date'=>'datetime',
        'qrcode'=>'string',
        'birthday'=>'datetime',
        'email'=>'string',
        'password'=>'string',
    ];
}
