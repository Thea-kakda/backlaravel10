<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
public function run(): void
    {
        // Create an admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@shopmaster.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create a customer user
        User::create([
            'name' => 'Customer User',
            'email' => 'customer@shopmaster.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);

        // Create categories
        $electronics = Category::create(['name' => 'Electronics', 'description' => 'Electronic gadgets']);
        $clothing = Category::create(['name' => 'Clothing', 'description' => 'Fashion and apparel']);

        // Create products
        Product::create([
            'name' => 'Polo Shirts',
            'description' => 'Latest model smartphone',
            'price' => 699.99,
            'stock' => 50,
            'category_id' => $electronics->id,
            'image' => 'smartphone.jpg',
        ]);

        Product::create([
            'name' => 'T-Shirt',
            'description' => 'Comfortable cotton t-shirt',
            'price' => 19.99,
            'stock' => 100,
            'category_id' => $clothing->id,
            'image' => 'tshirt.jpg',
        ]);
        // Create sample products
        Product::create([
            'name' => 'Smartphone',
            'description' => 'Latest model smartphone',
            'price' => 699.99,
            'stock' => 50,
            'category_id' => 1, // Electronics
            'image' => 'smartphone.jpg',
        ]);

        Product::create([
            'name' => 'T-Shirt',
            'description' => 'Comfortable cotton t-shirt',
            'price' => 19.99,
            'stock' => 100,
            'category_id' => 2, // Clothing
            'image' => 'tshirt.jpg',
        ]);

        Product::create([
            'name' => 'Programming Book',
            'description' => 'Learn to code with this book',
            'price' => 29.99,
            'stock' => 30,
            'category_id' => 3, // Books
            'image' => 'book.jpg',
        ]);
    }
}
