<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{

    public function getAll()
    {
        return User::all();
    }

    public function findById($id)
    {
        return User::find($id);
    }
    public function userLogin($name, $password)
    {
        $hashedPassword = Hash::make($password);
        $this->checkPass($hashedPassword);
    }

    public function checkPass($password)
    {
        // TODO: Implement checkPass() method.
    }
}
