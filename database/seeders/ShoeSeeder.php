<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Shoe;
use Illuminate\Database\Seeder;

class ShoeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
{
    Shoe::create([
        'name' => 'Sneakers Air Max Pro',
        'brand' => 'Nike',
        'price' => 1500000,
        'stock' => 10,
        'description' => 'Sepatu sneakers kasual yang sangat nyaman digunakan seharian.',
    ]);

    Shoe::create([
        'name' => 'Running Supernova',
        'brand' => 'Adidas',
        'price' => 1200000,
        'stock' => 5,
        'description' => 'Sepatu lari ringan dengan teknologi foam terbaru.',
    ]);
}
    
}
