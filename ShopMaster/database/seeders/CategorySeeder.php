<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            "Lifestyle",
            "Vest",
            "Sportlife",
            "Blazers",
            "Casual",
            "Shirts",
            "New In Top",
            "Polo Shirts",
            "New In Bottom",
            "T-Shirts",
            "Jackets"
        ];

        foreach ($categories as $category) {
            // បង្កើត slug ដោយប្រើ Str::slug()
            $slug = Str::slug($category);

            // ពិនិត្យថាមានក្នុង Database រួចហើយឬអត់
            $exists = DB::table('categories')->where('slug', $slug)->exists();

            if (!$exists) {
                DB::table('categories')->insert([
                    'name' => $category,
                    'slug' => $slug,
                    'description' => $category . ' category',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
