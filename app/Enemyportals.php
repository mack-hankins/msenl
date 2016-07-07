<?php

class Enemyportals extends \Eloquent
{

    protected $fillable = [];

    protected $table = 'enemyportals';


    public function scopeOwner($query, $owner)
    {
        return $query->where('owner', '=', $owner);
    }
}
