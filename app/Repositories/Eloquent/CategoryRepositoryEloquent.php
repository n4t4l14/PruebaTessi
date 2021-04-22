<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class CategoryRepositoryEloquent
 * @package App\Repositories\Eloquent
 */
class CategoryRepositoryEloquent implements CategoryRepositoryInterface
{
    /**
     * @var Category
     */
    private $category;

    /**
     * CategoryRepositoryEloquent constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return Collection
     */
    public function get(): Collection
    {
        return $this->category->all();
    }

    /**
     * @param int $categoryID
     * @return Category
     */
    public function find(int $categoryID): Category
    {
        $category = $this->category->find($categoryID);
        return $category;
    }

    public function edit(int $categoryID, string $name): Category
    {
        /** @var Category $category */
        $category = $this->category->find($categoryID);

        $category->name = $name;

        $category->save();

        return $category;
    }


}
