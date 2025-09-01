<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'heading', 'content', 'description', 'image', 'image_two',          
    'personal_experience', 
    'our_processing',    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function serviceCategories()
    {
        return $this->belongsToMany(ServiceCategory::class, 'service_service_category');
    }
}
