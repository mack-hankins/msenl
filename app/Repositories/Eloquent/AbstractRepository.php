<?php


namespace Msenl\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractRepository
 * @package Msenl\Repositories\Eloquent
 */
abstract class AbstractRepository
{

    protected $model;

    /**
     * AbstractRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->model->findOrFail($id);
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

    /**
     * @param $ids
     * @return mixed
     */
    public function destroy($ids)
    {
        return $this->model->whereIn('id',$ids)->delete();
    }
}
