<?php


namespace Msenl\Repositories\Eloquent;

use Msenl\Repositories\UserRepositoryInterface;
use Msenl\User;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{

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

    public function findByEmail($result)
    {
        return $this->model->where('email', '=', $result->email)->first();
    }

    public function findByEmailOrProvider($data, $provider)
    {
        return $this->model->where('email', '=', $data->email)->orWhere('provider', '=', $provider)->where('provider_id', '=', $data->id)->first();
    }

    public function store(array $data)
    {
        $user = $this->getNew();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->plusprofile = $data['url'];
        $user->agent = $data['agent'];
        $user->faction = $data['faction'];
        $user->level = $data['level'];
        $user->avatar = $data['avatar'];
        //Store Provider and ID.
        $user->provider = $data['provider'];
        $user->provider_id = $data['provider_id'];
        $user->save();
        return $user;
    }

    public function updateSocial($user, $data, $provider)
    {
        $user->email = $data->email;
        $user->avatar = $data->avatar;
        $user->provider = $provider;
        $user->provider_id = $data->id;
        $user->save();
    }

    public function update($id, array $data)
    {
        $user = $this->getNew();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->plusprofile = $data['url'];
        $user->agent = $data['agent'];
        $user->faction = $data['faction'];
        $user->level = $data['level'];
        $user->avatar = $data['avatar'];
        $user->city = $data['city'];
        $user->state = $data['state'];
        $user->postalcode = $data['postalcode'];
        $user->save();
        return $user;
    }
}
