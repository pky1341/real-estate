<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'address', 'city', 'state',
        'bedrooms', 'bathrooms', 'area', 'property_type_id', 'status', 'featured', 'property_images'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'featured' => 'boolean',
        'property_images' => 'array',
    ];

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }



    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }

    public function getFirstImageAttribute()
    {
        if ($this->property_images && count($this->property_images) > 0) {
            $imagePath = 'storage/' . $this->property_images[0];
            if (file_exists(public_path($imagePath))) {
                return asset($imagePath);
            }
        }
        return asset('images/img_1.jpg');
    }
    
    public function getAllImagesAttribute()
    {
        if ($this->property_images && count($this->property_images) > 0) {
            $images = [];
            foreach ($this->property_images as $image) {
                $imagePath = 'storage/' . $image;
                if (file_exists(public_path($imagePath))) {
                    $images[] = asset($imagePath);
                }
            }
            return count($images) > 0 ? $images : [asset('images/img_1.jpg')];
        }
        return [asset('images/img_1.jpg')];
    }

    public function getFormattedPriceAttribute()
    {
        if ($this->price >= 10000000) {
            return '₹' . number_format($this->price / 10000000, 1) . ' Cr';
        } elseif ($this->price >= 100000) {
            return '₹' . number_format($this->price / 100000, 1) . ' L';
        } else {
            return '₹' . number_format($this->price, 0, '.', ',');
        }
    }

    public function getFirstImagePathAttribute()
    {
        if ($this->property_images && count($this->property_images) > 0) {
            return 'storage/' . $this->property_images[0];
        }
        return 'images/img_1.jpg';
    }
}
