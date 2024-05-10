<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Property::factory()->count(10)->create();
        PropertyImage::insert([
            ['property_id' => 1, 'img_url' => 'hero_bg_1.jpg'],
            ['property_id' => 1, 'img_url' => 'hero_bg_2.jpg'],
            ['property_id' => 1, 'img_url' => 'hero_bg_3.jpg'],
            ['property_id' => 1, 'img_url' => 'hero_bg_4.jpg'],
        ]);
    }
}
