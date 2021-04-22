<?php

namespace App\Repositories\Eloquent;

use App\Models\Item;
use App\Repositories\Contracts\ItemRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class ItemRepositoryEloquent
 * @package App\Repositories\Eloquent
 */
class ItemRepositoryEloquent implements ItemRepositoryInterface
{
    /**
     * @var Item
     */
    private $item;

    /**
     * ItemRepositoryEloquent constructor.
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * @return Collection
     */
   public function get(): Collection
   {
       return $this->item->load('category')->all();
   }

    /**
     * @param int $itemID
     * @return Item
     */
   public function find(int $itemID): Item
   {
       return $this->item->find($itemID);
   }

    /**
     * @param int $itemID
     * @param string $name
     * @param string $registerNumber
     * @param int $quantity
     * @param int $categoryID
     * @return Item
     */
   public function edit(int $itemID, string $name, string $registerNumber, int $quantity, int $categoryID): Item
   {
       /** @var Item $item */
       $item = $this->item->find($itemID);

       $item->name = $name;
       $item->register_number = $registerNumber;
       $item->quantity = $quantity;
       $item->category_id = $categoryID;

       $item->save();

       return $item;
   }

    /**
     * Validar si el número de registro ya se encuentra en el sistema
     *
     * @param int $itemID
     * @param string $registerNumber
     * @return bool
     */
    public function validExistItem(int $itemID, string $registerNumber): bool
    {
        $validation = $this->item
            ->where('id', '!=',$itemID)
            ->where('register_number', $registerNumber)
            ->first(['id']);

        return !empty($validation);
    }
}
