<?php


namespace Msenl\Repositories\Eloquent;


use Msenl\Repositories\RoleRepositoryInterface;
use Msenl\Role;

/**
 * Class RoleRepository
 * @package Msenl\Repositories\Eloquent
 */
class RoleRepository extends AbstractRepository implements RoleRepositoryInterface
{

    /**
     * RoleRepository constructor.
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    /**
     * @return static
     */
    public function idName()
    {
        $roles = collect($this->model->select('id', 'name')->orderBy('name')->get())->map( function ($role) {
            return [
                'id' => $role->name,
                'name' => 'roles['.$role->id.']',
                'value' => $role->id,
            ];
        })->keyBy('name');

        return $roles;
    }
}