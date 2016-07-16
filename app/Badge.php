<?php

namespace Msenl;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Badge
 * @package Msenl
 */
class Badge extends Model
{

    /**
     * @var string
     */
    protected $table = 'badges';

    protected $fillable = ['name', 'slug', 'has_levels'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users(){
        return $this->belongsToMany('Msenl\User')->withPivot('level');
    }
}
