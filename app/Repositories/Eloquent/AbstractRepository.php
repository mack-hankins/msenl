<?php


namespace Msenl\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractRepository
 * @package Msenl\Repositories\Eloquent
 */
abstract class AbstractRepository {

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
       return $this->model->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * Get a new instance of the model.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getNew(array $attributes = array())
    {
        return $this->model->newInstance($attributes);
    }

}