<?php

namespace App\Repositories\Contracts;

use App\Models\Item;
use Illuminate\Support\Collection;

/**
 * Interface ItemRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface ItemRepositoryInterface
{
    /**
     * @return Collection
     */
    public function get(): Collection;

    /**
     * @param int $itemID
     * @return Item
     */
    public function find(int $itemID): Item;

    /**
     * @param int $itemID
     * @param string $name
     * @param string $registerNumber
     * @param int $quantity
     * @param int $categoryID
     * @return Item
     */
    public function edit(int $itemID, string $name, string $registerNumber, int $quantity, int $categoryID): Item;

    /**
     * Validar si el número de registro ya se encuentra en el sistema
     *
     * @param int $itemID
     * @param string $registerNumber
     * @return bool
     */
    public function validExistItem(int $itemID, string $registerNumber): bool;
}
