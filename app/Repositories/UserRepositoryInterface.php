<?php


namespace Msenl\Repositories;


interface UserRepositoryInterface {

    public function findByEmail($data);
    public function findByEmailOrProvider($data, $provider);
    public function store(array $data);
    public function updateSocial($user, $data, $provider);
    public function update($id, array $data);

}