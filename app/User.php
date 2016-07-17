<?php

namespace Msenl;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/**
 * Class User
 * @package Msenl
 */
class User extends Authenticatable
{

    use EntrustUserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['agent', 'level', 'city', 'state', 'postalcode', 'telegram', 'verified'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * Get the user's location.
     *
     * @return void
     */
    public function getLocationAttribute()
    {
        return $this->city.', '.$this->state.' '.$this->postalcode;
    }

    /*
     * Get Map for agent
     *
     * @return void
     */
    /**
     * @return string
     */
    public function getMapAttribute()
    {
        return 'https://www.google.com/maps/place/'.$this->location;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function badges()
    {
        return $this->belongsToMany('Msenl\Badge')->withPivot('level');
    }
}
