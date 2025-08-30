<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medicine;
class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Medicine::create([
            'name' => 'Panadol Extra',
            'quantity' => 100,
            'price' => 5.50,
            'expiry_date' => '2026-05-01',
            'status' => 'available',
        ]);

        Medicine::create([
            'name' => 'Aspirin 500mg',
            'quantity' => 50,
            'price' => 3.25,
            'expiry_date' => '2025-11-20',
            'status' => 'available',
        ]);

        Medicine::create([
            'name' => 'Amoxicillin 250mg',
            'quantity' => 200,
            'price' => 8.75,
            'expiry_date' => '2027-01-15',
            'status' => 'available',
        ]);

        Medicine::create([
            'name' => 'Vitamin C 1000mg',
            'quantity' => 300,
            'price' => 4.00,
            'expiry_date' => '2026-09-10',
            'status' => 'available',
        ]);

        Medicine::create([
            'name' => 'Ibuprofen 400mg',
            'quantity' => 150,
            'price' => 6.00,
            'expiry_date' => '2025-06-30',
            'status' => 'unavailable',
        ]);
    }
}
