<?php

namespace App\Http\Controllers;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    protected $authService;

    /**
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request){
        $name = $request->input('username');
        $pass = $request->input('password');

        $user = $this->authService->authenticate($name, $pass);

        if (!$user) return "Problema al iniciar sesion";

        Auth::login($user);

        return redirect('/dashboard');
    }

    public function showLoginForm()
    {
        return view('login');
    }
}
