<?php


namespace Msenl\Repositories\Eloquent;


use Msenl\Badge;
use Msenl\Repositories\BadgeRepositoryInterface;

/**
 * Class BadgeRepository
 * @package Msenl\Repositories\Eloquent
 */
class BadgeRepository extends AbstractRepository implements BadgeRepositoryInterface
{

    /**
     * BadgeRepository constructor.
     * @param Badge $model
     */
    public function __construct(Badge $model)
    {
        $this->model = $model;
    }

    /**
     * @return array
     */
    public function badgeLevels()
    {
        return [
            'bronze' => [
                'value' => 1,
            ],
            'silver' => [
                'value' => 2,
            ],
            'gold' => [
                'value' => 3
            ],
            'platinum' => [
                'value' => 4,
            ],
            'onyx' => [
                'value' => 5,
            ]
        ];
    }


    /**
     * @return mixed
     */
    public function tableData()
    {
        return $this->model->select('id', 'name', 'slug', 'has_levels');
    }


}