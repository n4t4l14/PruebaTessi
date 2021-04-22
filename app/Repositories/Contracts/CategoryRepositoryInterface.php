<?php

namespace App\Repositories\Contracts;

use App\Models\Category;
use Illuminate\Support\Collection;

/**
 * Interface CategoryRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface CategoryRepositoryInterface
{
    /**
     * @return Collection
     */
    public function get(): Collection;

    /**
     * @return Category
     */
    public function find(int $categoryID): Category;

    /**
     * @param int $categoryID
     * @param string $name
     * @return Category
     */
    public function edit(int $categoryID,string $name): Category;

}
