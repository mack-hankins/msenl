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

    public function findByEmail($email)
    {
        return $this->model->where('email','=',$email)->first();
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
        $user->postalcode = $data['postalcode'];
        //Grab their City, State, and Country from postalcode.
        $geocode = $this->geocoding->reverse($data['postalcode']);
        $user->city = $geocode->getCity();
        $user->state = $geocode->getRegionCode();
        $user->country = $geocode->getCountryCode();
        $user->save();
        return $user;
    }

    public function update($id, array $data)
    {
        
    }


}