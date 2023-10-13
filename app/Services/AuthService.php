<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthService
{
    public function authenticate($name, $pass)
    {
        $user = User::where('name', $name)->first();

        if (!$user || Hash::check($pass, $user->password)) return null;

        return $user;
    }
}
