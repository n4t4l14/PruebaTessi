<?php

namespace App\Http\Tessi\Api\V1\Controllers;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class EditCategoryController
 * @package App\Http\Tessi\Api\V1\Controllers
 */
class EditCategoryController
{
    /**
     * Actualización de Categorías
     *
     * @param int $categoryID
     * @param Request $request
     * @param CategoryRepositoryInterface $categoryRepository
     * @return JsonResponse
     */
    public function __invoke(int $categoryID, Request $request, CategoryRepositoryInterface $categoryRepository)
    {
        $attributes = $request->get('attributes');
        $categoryEdit = $categoryRepository->edit($categoryID, $attributes['name']);
        return response()->json([
            'data' => [
                'id' => $categoryID,
                'type' => 'categories',
                'attributes' => [
                    'name' => $categoryEdit->name,
                    'created_at' => $categoryEdit->created_at,
                    'updated_at' => $categoryEdit->updated_at
                ]
            ]
        ]);
    }
}
