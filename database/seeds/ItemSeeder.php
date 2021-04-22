<?php

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::all()->each(function (Category $category) {
            // Cargue de articulos para la categoría bebidas
            if ($category->name == 'bebidas') {
                $this->createItem($category->id, 'jugo');
                $this->createItem($category->id, 'gaseosa');
                $this->createItem($category->id, 'agua');
            }

            // Cargue de articulos para la categoría carnes
            if ($category->name == 'carnes') {
                $this->createItem($category->id, 'cerdo');
                $this->createItem($category->id, 'res');
                $this->createItem($category->id, 'pollo');
            }

            // Cargue de articulos para la categoría verduras
            if ($category->name == 'verduras') {
                $this->createItem($category->id, 'brocoli');
                $this->createItem($category->id, 'espinaca');
                $this->createItem($category->id, 'lechuga');
            }
        });
    }

    private function createItem(int $categoryID, $name): void
    {
        factory(Item::class)->create([
            'category_id' => $categoryID,
            'name' => $name
        ]);
    }
}
