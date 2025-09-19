<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\PropertyType;

class PropertySeeder extends Seeder
{
    public function run()
    {
        $propertyTypes = PropertyType::all();
        
        if ($propertyTypes->isEmpty()) {
            $this->command->info('Please run PropertyTypeSeeder first');
            return;
        }

        $properties = [
            [
                'title' => 'Modern Family Home',
                'description' => 'Beautiful modern family home with spacious rooms, updated kitchen, and large backyard. Perfect for families looking for comfort and style.',
                'price' => 850000,
                'address' => '123 Oak Street',
                'city' => 'San Francisco',
                'state' => 'California',
                'cabins' => 4,
                'bathrooms' => 3,
                'area' => 2500,
                'work_station' => 'Modular',
                'property_type_id' => $propertyTypes->where('name', 'House')->first()->id ?? 1,
                'status' => 'available',
                'featured' => true,
            ],
            [
                'title' => 'Downtown Luxury Apartment',
                'description' => 'Stunning luxury apartment in the heart of downtown with panoramic city views, modern amenities, and premium finishes.',
                'price' => 650000,
                'address' => '456 Main Avenue',
                'city' => 'New York',
                'state' => 'New York',
                'cabins' => 2,
                'bathrooms' => 2,
                'area' => 1200,
                'work_station' => 'Normal',
                'property_type_id' => $propertyTypes->where('name', 'Apartment')->first()->id ?? 2,
                'status' => 'available',
                'featured' => true,
            ],
            [
                'title' => 'Cozy Suburban Villa',
                'description' => 'Charming suburban villa with beautiful garden, garage, and quiet neighborhood. Ideal for peaceful living.',
                'price' => 720000,
                'address' => '789 Pine Road',
                'city' => 'Austin',
                'state' => 'Texas',
                'cabins' => 3,
                'bathrooms' => 2,
                'area' => 1800,
                'work_station' => 'Modular',
                'property_type_id' => $propertyTypes->where('name', 'Villa')->first()->id ?? 1,
                'status' => 'available',
                'featured' => false,
            ],
            [
                'title' => 'Waterfront Condo',
                'description' => 'Spectacular waterfront condominium with breathtaking ocean views, private balcony, and resort-style amenities.',
                'price' => 950000,
                'address' => '321 Beach Boulevard',
                'city' => 'Miami',
                'state' => 'Florida',
                'cabins' => 3,
                'bathrooms' => 2,
                'area' => 1600,
                'work_station' => 'Normal',
                'property_type_id' => $propertyTypes->where('name', 'Condo')->first()->id ?? 2,
                'status' => 'available',
                'featured' => true,
            ],
            [
                'title' => 'Historic Townhouse',
                'description' => 'Beautifully restored historic townhouse with original features, modern updates, and prime location.',
                'price' => 1200000,
                'address' => '654 Heritage Lane',
                'city' => 'Boston',
                'state' => 'Massachusetts',
                'cabins' => 4,
                'bathrooms' => 3,
                'area' => 2200,
                'work_station' => 'Modular',
                'property_type_id' => $propertyTypes->where('name', 'Townhouse')->first()->id ?? 1,
                'status' => 'available',
                'featured' => false,
            ],
            [
                'title' => 'Mountain View Cabin',
                'description' => 'Rustic mountain cabin with stunning views, fireplace, and outdoor deck. Perfect weekend getaway.',
                'price' => 450000,
                'address' => '987 Mountain Trail',
                'city' => 'Denver',
                'state' => 'Colorado',
                'cabins' => 2,
                'bathrooms' => 1,
                'area' => 1000,
                'work_station' => 'Normal',
                'property_type_id' => $propertyTypes->first()->id,
                'status' => 'available',
                'featured' => true,
            ]
        ];

        foreach ($properties as $property) {
            Property::create($property);
        }

        $this->command->info('Properties seeded successfully!');
    }
}