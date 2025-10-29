<?php
use Illuminate\Support\Str;
use App\Models\Product;
Product::create([
    'name' => 'Polo Shirts',
    'slug' => Str::slug('Polo Shirts'),
    'description' => 'Latest model smartphone',
    'price' => 699.99,
    'stock' => 50,
    'category_id' => 1,
    'image' => 'smartphone.jpg',
]);
