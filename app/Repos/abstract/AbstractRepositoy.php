<?php

namespace App\Repos\AbstractClass;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        if ($this->class) {
            return $this->model = new $this->class;
        }
    }

    public function selfModel()
    {
        return $this->model;
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function where(array $options)
    {
        return $this->model->where($options);
    }

    public function orderBy($field, $sort)
    {
        return $this->model->orderBy($field, $sort);
    }

    public function paginate($model)
    {
        return $model->paginate(15);
    }

    public function count($model)
    {
        return $model->count();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function save($model)
    {
        $model->save();
        return $model->refresh();
    }

    public function fill($model, array $array)
    {
        return $model->fill($array);
    }

    public function first($model)
    {
        return $model->first();
    }

    public function get($model)
    {
        return $model->get();
    }

    public function firstOrCreate(array $options)
    {
        return $this->model->firstOrCreate($options);
    }
}
