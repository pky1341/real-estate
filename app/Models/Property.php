<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'description', 'price', 'address', 'city', 'state',
        'bedrooms', 'bathrooms', 'area', 'property_type_id', 'status', 'featured', 'property_images'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'featured' => 'boolean',
        'property_images' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    protected $hidden = [];
    
    // Validation rules
    public static function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'price' => 'required|numeric|min:0',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'bedrooms' => 'required|integer|min:1|max:20',
            'bathrooms' => 'required|integer|min:1|max:20',
            'area' => 'required|integer|min:100',
            'property_type_id' => 'required|exists:property_types,id',
            'status' => 'required|in:available,sold,rented',
        ];
    }
    
    // Mutators for security
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = Str::limit(strip_tags(trim($value)), 255);
    }
    
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = Str::limit(strip_tags(trim($value)), 2000);
    }
    
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = strip_tags(trim($value));
    }

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
            $imagePath = $this->property_images[0];
            // Security: Validate image path
            if ($this->isValidImagePath($imagePath) && Storage::disk('public')->exists($imagePath)) {
                return Storage::disk('public')->url($imagePath);
            }
        }
        return asset('images/img_1.jpg');
    }
    
    private function isValidImagePath(string $path): bool
    {
        // Security: Prevent path traversal
        return !str_contains($path, '..') && 
               preg_match('/^[a-zA-Z0-9/_.-]+\.(jpg|jpeg|png|webp)$/i', $path);
    }
    
    public function getAllImagesAttribute()
    {
        if ($this->property_images && count($this->property_images) > 0) {
            $images = [];
            foreach ($this->property_images as $image) {
                if ($this->isValidImagePath($image) && Storage::disk('public')->exists($image)) {
                    $images[] = Storage::disk('public')->url($image);
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
            $imagePath = $this->property_images[0];
            if ($this->isValidImagePath($imagePath)) {
                return 'storage/' . $imagePath;
            }
        }
        return 'images/img_1.jpg';
    }
}
