<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Создание коммента
     *
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $model = new Comment;

        $model->fill($request->all());
        $model->save();

        return redirect()->back()->withSuccess('Комментарий создан');
    }
}
