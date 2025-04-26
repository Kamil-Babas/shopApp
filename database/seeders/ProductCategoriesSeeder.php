<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategoriesSeeder extends Seeder
{

    /**
     * Seed the product categories table.
     */
    public function run(): void
    {
        $categories = [
            
            [
                'name' => 'Electronics',
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'name' => 'Clothing',
                'created_at' => now(),
                'updated_at' => now()
            ],
            
            [
                'name' => 'Other',
                'created_at' => now(),
                'updated_at' => now()
            ],
            
        ];

        // Sort categories alphabetically by the 'name' field
        usort($categories, function ($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        // Insert the sorted categories into the database
        ProductCategory::insert($categories);
    }

}
