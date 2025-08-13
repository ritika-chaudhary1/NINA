<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioDetail extends Model
{
    protected $fillable = ['title', 'subtitle', 'image', 'description'];
}
