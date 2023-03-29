<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfume extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'descriprion',
        'product_img',
        'id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
