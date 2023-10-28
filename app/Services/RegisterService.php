<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegisterService
{
    public function validateInformation($name, $pass, $height, $weight, $email, $age)
    {
        $request = 0;
        $request->validate([
            $name => 'required|max:50',
            $pass => 'required|min:8|confirmed',
            $email => 'required|max:50|unique',
            $age => 'required|max:2',
            $height => 'required|max:3',
            $weight => 'required|max:3'
        ]);
    }
}
