<?php

namespace App\Http\Controllers;

use App\Repos\Interfaces\TagRepositoryInterface;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagModel;

    public function __construct(TagRepositoryInterface $tagModel)
    {
        $this->tagModel = $tagModel;
    }
    /**
     * Найти теги
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTag(Request $request)
    {
        $model = $this->tagModel->search($request->search);
        $model = $this->tagModel->get($model);

        return response()->json([
            'models' => $model
        ]);
    }
}
