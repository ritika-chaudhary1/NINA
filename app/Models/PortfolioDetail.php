<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_category_id',
        'title',
        'subtitle',
        'image',
        'description',
        'client',
        'location',
    ];

    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class, 'portfolio_category_id');
    }
}

