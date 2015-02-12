<?php


namespace Msenl\Repositories;


interface UserRepositoryInterface {

    public function findByEmail($string);

}