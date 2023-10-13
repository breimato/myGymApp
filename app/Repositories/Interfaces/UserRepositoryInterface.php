<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function userLogin($name, $password);
    public function checkPass($password);

}
