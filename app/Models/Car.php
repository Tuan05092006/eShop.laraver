<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['brand_id', 'name', 'model', 'year', 'price', 'image', 'technical_specs'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
