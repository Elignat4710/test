<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Найти теги
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTag(Request $request)
    {
        return response()->json([
            'models' => Tag::search($request->search)->get()
        ]);
    }
}
