<?php

namespace App\Http\Tessi\Web\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Repositories\Contracts\ItemRepositoryInterface;
use Illuminate\View\View;

/**
 * Class ItemHomeController
 * @package App\Http\Tessi\Web\Controllers
 */
class ItemHomeController extends Controller
{
    /**
     * @var ItemRepositoryInterface
     */
    private $itemRepository;

    /**
     * ItemHomeController constructor.
     * @param ItemRepositoryInterface $itemRepository
     */
    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    /**
     * @return View
     */
    public function __invoke(): view
    {
        $pageItems = true;
        $itemsList = json_encode($this->getItemsList());

        $data = compact('pageItems', 'itemsList');
        return view('pages.item.itemsList', $data);
    }

    /**
     * Obtiene el listado completo de categorías
     * @return array
     */
    private function getItemsList(): array
    {
        $list = ['data' => []];
        $rows = $this->itemRepository->get();
        $rows->each(function (Item $item) use (&$list) {
            $item = [
                'data' => [
                    'id' => $item->id,
                    'type' => 'items',
                    'attributes' => [
                        'name' => $item->name,
                        'register_number' => $item->register_number,
                        'category_id' => $item->category_id,
                        'quantity' => $item->quantity,
                        'created_at' => $item->created_at,
                        'updated_at' => $item->updated_at
                    ]
                ],
                'meta' => [
                    'link_edit' => route('tessi.api.item.edit', $item->id),
                    'category' => [
                        'id' => $item->category_id,
                        'name' => $item->category->name,
                    ],
                ]
            ];

            $list['data'][] = $item;
        });

        return $list;
    }
}
