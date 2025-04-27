<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; 

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [

            ['T-shirt', 'Comfortable cotton T-shirt', 100, 29.99, 1, null],
            ['Jeans', 'Classic blue jeans', 50, 79.99, 1, null],
            ['Smartphone', 'Latest model smartphone', 30, 999.99, 2, null],
            ['Headphones', 'Noise-cancelling headphones', 80, 199.99, 2, null],
            ['Backpack', 'Durable travel backpack', 70, 59.99, 1, null],
            ['TV', '55 inch 4K TV', 15, 1499.99, 2, null],
            ['Book', 'Inspirational novel', 120, 24.99, 3, null],
            ['Shoes', 'Running shoes', 90, 89.99, 1, null],
            ['Laptop', 'Powerful gaming laptop', 10, 2499.99, 2, null],
            ['Water Bottle', 'Eco-friendly water bottle', 200, 19.99, 3, null],
        
            // DODANE NOWE PRODUKTY:
            ['Sunglasses', 'Stylish UV protection sunglasses', 150, 49.99, 1, null],
            ['Bluetooth Speaker', 'Portable Bluetooth speaker', 60, 129.99, 2, null],
            ['Jacket', 'Winter waterproof jacket', 40, 199.99, 1, null],
            ['Tablet', 'High performance tablet', 25, 899.99, 2, null],
            ['Gaming Mouse', 'RGB backlit gaming mouse', 100, 59.99, 2, null],
            ['Notebook', 'Hardcover lined notebook', 300, 9.99, 3, null],
            ['Desk Lamp', 'LED adjustable desk lamp', 70, 39.99, 3, null],
            ['Sweater', 'Woolen cozy sweater', 80, 69.99, 1, null],
            ['Camera', 'Digital SLR camera', 20, 1199.99, 2, null],
            ['Coffee Mug', 'Ceramic coffee mug', 250, 14.99, 3, null],
            
        ];

        foreach ($products as [$name, $description, $amount, $price, $categoryId, $imagePath]) {
            Product::create([
                'name' => $name,
                'description' => $description,
                'amount' => $amount,
                'price' => $price,
                'category_id' => $categoryId,
                'image_path' => $imagePath,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
