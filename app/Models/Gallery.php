<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['gallery_name', 'images'];

    protected $casts = [
        'images' => 'array',
    ];

}
