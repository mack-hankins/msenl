<?php


namespace Msenl\Repositories\Eloquent;


use Msenl\Repositories\GeoCodingRepositoryInterface;
use Msenl\Repositories\UserRepositoryInterface;
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
    public function __construct(User $model, GeoCodingRepositoryInterface $GeoCodingRepository)
    {
        $this->model = $model;
        $this->geocoding = $GeoCodingRepository;
    }

    public function findByEmail($result)
    {
        return $this->model->where('email','=',$result->email)->first();
    }

    public function findByEmailOrProviderId($result)
    {
        return $this->model->where('email','=',$result->email)->orWhere('provider_id','=',$result->id)->first();
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

    public function updateSocial($data)
    {
        $user = $this->findByEmailOrProviderId($data);
        $user->email = $data->email;
        $user->avatar = $data->avatar;
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