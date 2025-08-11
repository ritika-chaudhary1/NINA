<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogDetails extends Model
{
        protected $fillable = ['name'];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

}
