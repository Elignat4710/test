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

    /**
     * Инициализация клсса модели
     *
     * @return mixed
     */
    public function init()
    {
        if ($this->class) {
            return $this->model = app()->make($this->class);
        }
    }

    /**
     * Получить инстанс модели
     *
     * @return mixed
     */
    public function selfModel()
    {
        return $this->model;
    }

    /**
     * Поиск по id
     *
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * Логическое условие where
     *
     * @param array $options
     * @return mixed
     */
    public function where(array $options)
    {
        return $this->model->where($options);
    }

    /**
     * Сортировка по полю
     *
     * @param string $field
     * @param string $sort
     * @return mixed
     */
    public function orderBy(string $field, string $sort)
    {
        return $this->model->orderBy($field, $sort);
    }

    /**
     * Пагинация
     *
     * @param $model
     * @return mixed
     */
    public function paginate($model)
    {
        return $model->paginate(15);
    }

    /**
     * Количество записей в коллекции
     *
     * @param $model
     * @return mixed
     */
    public function count($model)
    {
        return $model->count();
    }

    /**
     * Получение всех записей из бд
     *
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Сохранение модели и возвращение инстанса
     *
     * @param $model
     * @return Model
     */
    public function save($model)
    {
        $model->save();
        return $model->refresh();
    }

    /**
     * Заполнение модели
     *
     * @param $model
     * @param array $array
     * @return Model
     */
    public function fill($model, array $array)
    {
        return $model->fill($array);
    }

    /**
     * Получение первой записи
     *
     * @param Model $model
     * @return mixed
     */
    public function first($model)
    {
        return $model->first();
    }

    public function get($model)
    {
        return $model->get();
    }

    /**
     * Возвращает первую запись или создает новую
     *
     * @param array $options
     * @return mixed
     */
    public function firstOrCreate(array $options)
    {
        return $this->model->firstOrCreate($options);
    }

    /**
     * Создает запись
     *
     * @param array $options
     * @return mixed
     */
    public function create(array $options)
    {
        return $this->model->create($options);
    }

    /**
     * Обновляет модель
     *
     * @param Model $model
     * @param array $options
     * @return Model
     */
    public function update($model, array $options)
    {
        $model->update($options);

        return $model->refresh();
    }

    /**
     * Возвращает в запрос связь
     *
     * @param Model $model
     * @param string $relation
     * @return mixed
     */
    public function with($model, string $relation)
    {
        return $model->with($relation);
    }
}
