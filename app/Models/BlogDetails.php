<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogDetails extends Model
{
    use HasFactory;

    protected $table = 'blogs_details';

    protected $fillable = [
        'title',
        'description',
        'image',
        'categories',
    ];

    protected $casts = [
        'categories' => 'array', // JSON to array
    ];
}
