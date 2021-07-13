<?php

namespace App\Http\Controllers;

use App\Repos\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryModel;

    public function __construct(CategoryRepositoryInterface $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    /**
     * Найти категорию
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategory(Request $request)
    {
        $model = $this->categoryModel->search($request->search);
        $model = $this->categoryModel->get($model);

        return response()->json([
            'models' => $model
        ]);
    }
}
