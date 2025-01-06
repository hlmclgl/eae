<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Örnek kategori
        $category = Category::create([
            'name' => 'Tel Kablo Kanalı',
            'slug' => Str::slug('Tel Kablo Kanalı'),
            'description' => 'Tel kablo kanalı ürünleri',
            'is_active' => true
        ]);

        // Örnek ürün
        Product::create([
            'name' => 'Tel Kablo Kanalı 50x50',
            'slug' => Str::slug('Tel Kablo Kanalı 50x50'),
            'description' => 'Tel kablo kanalı 50x50 ölçülerinde',
            'category_id' => $category->id,
            'specifications' => json_encode(['width' => '50mm', 'height' => '50mm']),
            'is_active' => true
        ]);
    }
}
