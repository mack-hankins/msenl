<?php


namespace Msenl\Repositories\Eloquent;


use Msenl\Repositories\UserRepositoryInterface;
use Msenl\Forms\RegisterForm;
use Msenl\User;

class UserRepository extends AbstractRepository implements UserRepositoryInterface {

    /**
     * @var Model
     */
    protected $model;

    /**
     * Constructor
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function findByEmail($email)
    {
        return $this->model->where('email','=',$email)->first();
    }

    public function store(array $data)
    {
        $user = $this->getNew();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->plusprofile = $data['link'];
        $user->agent = $data['agent'];
        $user->faction = $data['faction'];
        $user->level = $data['level'];
        $user->avatar = $data['avatar'];
        $user->save();
        return $user;
    }

    public function getForm()
    {
        return new RegisterForm();
    }

    public function update($id, array $data)
    {
        
    }


}