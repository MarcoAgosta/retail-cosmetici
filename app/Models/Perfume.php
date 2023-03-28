<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfume extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cover_img',
        'descriprion',
        'id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
