<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'products';
    protected $fillable = ['category_id', 'type', 'name', 'description', 'model', 'year', 'price', 'image', 'is_featured', 'technical_specs'];

    /**
     * Register media collections for the product.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images');

        $this->addMediaCollection('thumbnail')
            ->singleFile();
    }

    protected $casts = [
        'technical_specs' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->category();
    }

    public function getEngineAttribute()
    {
        return $this->technical_specs['engine'] ?? 'V12';
    }

    public function getTransmissionAttribute()
    {
        return $this->technical_specs['transmission'] ?? 'Automatic';
    }

    public function getFuelTypeAttribute()
    {
        return $this->technical_specs['fuel_type'] ?? 'Gasoline';
    }

    public function getMileageAttribute()
    {
        return $this->technical_specs['mileage'] ?? 0;
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
