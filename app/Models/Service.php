<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['title','icon'];

    public function details()
    {
        return $this->hasMany(ServiceDetail::class)->orderBy('order');
    }
  
}
