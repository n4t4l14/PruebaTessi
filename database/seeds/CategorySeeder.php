<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

/**
 * Class CategorySeeder
 */
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $categories = ['bebidas', 'carnes', 'verduras'];

        foreach ($categories as $category) {
            factory(Category::class)->create([
                'name' => $category
            ]);
        }
    }
}
