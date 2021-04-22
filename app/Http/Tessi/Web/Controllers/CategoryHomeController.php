<?php

namespace App\Http\Tessi\Web\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\View\View;

/**
 * Class CategoryHomeController
 * @package App\Http\Tessi\Web\Controllers
 */
class CategoryHomeController extends Controller
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * CategoryHomeController constructor.
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @return View
     */
    public function __invoke(): view
    {
        $pageCategories = true;
        $categoriesList = json_encode($this->getCategoriesList());

        $data = compact('pageCategories', 'categoriesList');
        return view('pages.category.categoriesList', $data);
    }

    /**
     * Obtiene el listado completo de categorias
     * @return array
     */
    public function getCategoriesList(): array
    {
        $list = ['data' => []];
        $rows = $this->categoryRepository->get();
        $rows->each(function (Category $category) use (&$list) {
            $category = [
                'data' => [
                    'id' => $category->id,
                    'type' => 'categories',
                    'attributes' => [
                        'name' => $category->name,
                        'created_at' => $category->created_at,
                        'updated_at' => $category->updated_at
                    ]
                ],
                'meta' => [
                    'link_edit' => route('tessi.api.category.edit', $category->id)
                ]
            ];

            $list['data'][] = $category;
        });

        return $list;
    }
}
