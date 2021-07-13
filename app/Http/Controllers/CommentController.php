<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
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
    public function create(CommentRequest $request)
    {
        $request->validated();
        
        $model = $this->commentModel->selfModel();
        $model = $this->commentModel->fill($model, $request->all());
        $this->commentModel->save($model);

        return redirect()->back()->withSuccess('Коммент создан');
    }

    public function getComment($id)
    {
        $model = $this->commentModel->find($id);

        return response()->json([
            'comment' => $model
        ]);
    }
}
