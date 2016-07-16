<?php


namespace Msenl\Repositories;

/**
 * Interface UserRepositoryInterface
 * @package Msenl\Repositories
 */
interface UserRepositoryInterface
{

    /**
     * @param $string
     * @return mixed
     */
    public function findByAgentName($string);

    /**
     * @param $data
     * @return mixed
     */
    public function findByEmail($data);

    /**
     * @param $data
     * @param $provider
     * @return mixed
     */
    public function findByEmailOrProvider($data, $provider);

    /**
     * @param $user
     * @return mixed
     */
    public function userBadges($user);

    /**
     * @param $data
     * @param $provider
     * @return mixed
     */
    public function newSocial($data, $provider);

    /**
     * @param $user
     * @param $data
     * @param $provider
     * @return mixed
     */
    public function updateSocial($user, $data, $provider);

    /**
     * @param $id
     * @param array $data
     * @param $admin
     * @return mixed
     */
    public function update($id, array $data, $admin);
    public function allUsers();
    public function allVerifiedMSUsers();
}
