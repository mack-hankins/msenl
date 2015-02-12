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
     * @param integer $id
     * @return mixed
     */
    public function getById(integer $id)
    {
        return $this->model->find($id);
    }

}