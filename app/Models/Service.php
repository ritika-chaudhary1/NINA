<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function serviceCategories()
    {
        return $this->belongsToMany(ServiceCategory::class, 'service_service_category');
    }
}
