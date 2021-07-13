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

    public function getTag(Request $request)
    {
        $model = $this->tagModel->search($request->search);
        $model = $this->tagModel->get($model);

        return response()->json([
            'models' => $model
        ]);
    }
}
