<?php


namespace Msenl\Repositories;


interface UserRepositoryInterface {

    public function findByEmail($string);
    public function store(array $data);
    public function update($id, array $data);
    public function getForm();

}