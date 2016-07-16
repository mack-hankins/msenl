<?php

namespace Msenl\Repositories;


/**
 * Interface FaqRepositoryInterface
 * @package Msenl\Repositories
 */
interface FaqRepositoryInterface
{
    public function allByOrder();
    public function lastOrder();

    /**
     * @param $data
     * @return mixed
     */
    public function store($data);

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id);
    public function tableData();

    /**
     * @param $id
     * @param $newOrder
     * @return mixed
     */
    public function updateOrder($id, $newOrder);
}