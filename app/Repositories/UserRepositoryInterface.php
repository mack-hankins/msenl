<?php


namespace Msenl\Repositories;


interface UserRepositoryInterface {

    public function findByEmail($string);
    public function findByEmailOrProviderId($string);
    public function store(array $data);
    public function updateSocial($data);
    public function update($id, array $data);

}