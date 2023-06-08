<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setings extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'logowebsite',
        'deskripsiwebsite',
        'email',
        'notelepon',
        'alamat',
        'ig',
        'facebook',
        'twitter',
    ];
}
