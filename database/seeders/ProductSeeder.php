<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Stethoscope',
                'description' => 'High-quality stethoscope for medical diagnosis',
                'price' => 2500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blood Pressure Monitor',
                'description' => 'Automatic digital BP monitor with cuff',
                'price' => 3200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Syringe Pack',
                'description' => 'Disposable sterile syringes (pack of 50)',
                'price' => 1200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hospital Bed',
                'description' => 'Adjustable hospital bed with side rails',
                'price' => 18000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'X-Ray Machine',
                'description' => 'Portable X-Ray machine for diagnostic imaging',
                'price' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wheelchair',
                'description' => 'Foldable wheelchair for patient mobility',
                'price' => 7500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
