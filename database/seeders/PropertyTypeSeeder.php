<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PropertyType;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['House', 'Apartment', 'Villa', 'Condo', 'Townhouse', 'Studio', 'Duplex', 'Penthouse'];
        
        foreach ($types as $type) {
            PropertyType::firstOrCreate(['name' => $type]);
        }
        
        $this->command->info('Property types seeded successfully!');
    }
}
