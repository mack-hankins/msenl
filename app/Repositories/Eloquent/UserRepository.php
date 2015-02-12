<?php


namespace Msenl\Repositories\Eloquent;


use Msenl\Repositories\UserRepositoryInterface;

class UserRepository extends AbstractRepository implements UserRepositoryInterface {

    /**
     * @var Model
     */
    protected $model;

    /**
     * Constructor
     */
    public function __construct(\User $model)
    {
        $this->model = $model;
    }

    public function findByEmail($email)
    {
        return $this->model->where('email','=',$email)->first();
    }


}