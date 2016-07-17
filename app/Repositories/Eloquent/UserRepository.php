<?php

namespace Msenl\Repositories\Eloquent;

use Msenl\Repositories\UserRepositoryInterface;
use Msenl\User;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepository
 * @package Msenl\Repositories\Eloquent
 */
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

    /**
     * @param $string
     * @return mixed
     */
    public function findByAgentName($string)
    {
        return $this->model->where('agent', '=', $string)->firstOrFail();
    }

    /**
     * @param $result
     * @return mixed
     */
    public function findByEmail($result)
    {
        return $this->model->where('email', '=', $result->email)->first();
    }

    /**
     * @param $data
     * @param $provider
     * @return mixed
     */
    public function findByEmailOrProvider($data, $provider)
    {
        return $this->model->where('email', '=', $data->email)->orWhere('provider', '=',
            $provider)->where('provider_id', '=', $data->id)->first();
    }


    /**
     * @param $user
     * @return mixed
     */
    public function userBadges($user)
    {
        return $user->badges;
    }

    /**
     * @param $data
     * @param $provider
     * @return mixed
     */
    public function newSocial($data, $provider)
    {
        $user = new $this->model;
        $user->name = $data->name;
        $user->email = $data->email;
        $user->avatar = $data->avatar;
        $user->provider = $provider;
        $user->provider_url = $data->user['url'];
        $user->provider_id = $data->id;
        $user->save();

        return $user;
    }

    /**
     * @param $user
     * @param $data
     * @param $provider
     * @return mixed
     */
    public function updateSocial($user, $data, $provider)
    {
        $user->name = $data->name;
        $user->email = $data->email;
        $user->avatar = $data->avatar;
        $user->provider = $provider;
        $user->provider_url = $data->user['url'];
        $user->provider_id = $data->id;
        $user->save();

        return $user;
    }

    /**
     * @param $id
     * @param array $data
     * @param bool $admin
     * @return mixed
     */
    public function update($id, array $data, $admin = false)
    {
        $user = $this->find($id);
        $user->fill($data);
        $badges = (!empty($data['badges']) ? $data['badges'] : []);
        $user->badges()->sync($badges);
        if($admin) {
            $roles = (!empty($data['roles']) ? $data['roles'] : []);
            $user->roles()->sync($roles);
        }
        $user->save();


        return $user;
    }

    /**
     * @return mixed
     */
    public function allUsers()
    {
        return DB::table('users')->select(['id', 'agent', 'email', 'verified', 'level', 'city', 'state']);
    }

    /**
     * @return mixed
     */
    public function allVerifiedMSUsers()
    {
        return $this->model
            ->where('verified', '=', 1)
            ->where('state', '=', 'MS')
            ->select('agent', 'city', 'state', 'postalcode', 'level', 'avatar');

    }

}
