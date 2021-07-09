<?php

namespace App\Http\Controllers;

use App\Repos\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentModel;

    public function __construct(CommentRepository $commentModel)
    {
        $this->commentModel = $commentModel;
    }
    
    /**
     * Создание коммента
     *
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $model = $this->commentModel->selfModel();
        $model = $this->commentModel->fill($model, $request->all());
        $this->commentModel->save($model);

        return redirect()->back()->withSuccess('Коммент создан');
    }
}
