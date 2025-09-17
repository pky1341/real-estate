<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['House', 'Apartment', 'Villa', 'Condo', 'Townhouse', 'Studio'];
        
        foreach ($types as $type) {
            \App\Models\PropertyType::create(['name' => $type]);
        }
    }
}
