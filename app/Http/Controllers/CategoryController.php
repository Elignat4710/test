<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Найти категорию
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategory(Request $request)
    {
        return response()->json([
            'models' => Category::search($request->search)->get()
        ]);
    }
}
