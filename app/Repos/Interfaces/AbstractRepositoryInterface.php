<?php


namespace App\Repos\Interfaces;


use Illuminate\Database\Eloquent\Model;

interface AbstractRepositoryInterface
{
    public function init();
    public function selfModel();
    public function find(int $id);
    public function where(array $options);
    public function orderBy(string $field, string $sort);
    public function paginate($model);
    public function count($model);
    public function all();
    public function save($model);
    public function fill($model, array $array);
    public function first($model);
    public function get($model);
    public function firstOrCreate(array $options);
    public function create(array $options);
    public function update($model, array $options);
    public function with($model, string $relation);
}
