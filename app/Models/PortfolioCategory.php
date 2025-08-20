<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_name'];

    public function details()
    {
        return $this->hasMany(PortfolioDetail::class, 'portfolio_category_id');
    }
}
