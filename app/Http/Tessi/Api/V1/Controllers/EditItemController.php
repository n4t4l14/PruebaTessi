<?php

namespace App\Http\Tessi\Api\V1\Controllers;

use App\Repositories\Contracts\ItemRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class EditItemController
 * @package App\Http\Tessi\Api\V1\Controllers
 */
class EditItemController
{
    /**
     * Actualización de Categorías
     *
     * @param int $itemID
     * @param Request $request
     * @param ItemRepositoryInterface $itemRepository
     * @return JsonResponse
     */
    public function __invoke(
        int $itemID,
        Request $request,
        ItemRepositoryInterface $itemRepository
    ): JsonResponse {

        $item = $request->get('data')['attributes'];
        if ($itemRepository->validExistItem($itemID, $item['register_number'])) {
            return response()->json(
                ['error' => 'El número de registro ' . $item['register_number'] . ' ya esta registrado!'],
                506
            );
        }

        // actualización de articulo
        $itemUpdated = $itemRepository->edit(
            $itemID,
            $item['name'],
            $item['register_number'],
            $item['quantity'],
            $item['category_id']
        );

        return response()->json($itemUpdated->toArray());
    }
}
