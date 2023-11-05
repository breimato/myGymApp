<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


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
        $SUCCESS_MSG = "Usuario loggeado con éxito.";

        $name = $request->input('name');
        $pass = bcrypt($request->input('password'));

        $user = $this->authService->authenticate($name, $pass);

        if (!$user) {
            return response()->json([
                'success' => false,
                'errors' => [["¡Nombre y/o contraseña incorrectos!"]]
            ], 422);
        }

        Auth::login($user);

        return response()->json(['success' => true, 'message' => $SUCCESS_MSG, 'operation' => 'login']);
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterForm(){
        return view('register');
    }

    public function registerUser(Request $request)
    {
        $SUCCESS_MSG = "Usuario creado con éxito.";
        $data = $request->all();
        $data['name'] = trim($data['name']);
        $data['password'] = trim($data['password']);
        $data['password']  = bcrypt($data['password']);

        $validator = Validator::make($data, $this->getValidationRules(), $this->getValidationMessages());

        if ($validator->fails()) return response()->json(['errors' => $validator->errors()], 422);

        if ($this->authService->userExists($data['name'])) return response()->json(['message' => 'El nombre de usuario ya está en uso.'], 422);

        User::create($data);

        return response()->json(['success' => true, 'message' => $SUCCESS_MSG, 'operation' => 'register']);
    }

    private function getValidationMessages()
    {
        return [
            // Para el name
            'name.required' => 'El nombre de usuario es obligatorio.',
            'name.string' => 'El nombre de usuario debe ser una cadena de texto.',
            'name.max' => 'El nombre de usuario no debe exceder los 255 caracteres.',
            'name.unique' => 'Este nombre de usuario ya está en uso.',

            // Para el email
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Introduce un correo electrónico válido.',
            'email.max' => 'El correo electrónico no debe exceder los 255 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',

            // Para la contraseña
            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.regex' => 'La contraseña debe contener al menos un número.',

            // Para la fecha de nacimiento
            'birthdate.required' => 'La fecha de nacimiento es obligatoria.',
            'birthdate.date' => 'Introduce una fecha válida para la fecha de nacimiento.',

            // Para el peso
            'weight.required' => 'El peso es obligatorio.',
            'weight.numeric' => 'El peso debe ser un número.',
            'weight.between' => 'El peso debe estar entre 40 y 200 kg.',

            // Para la altura
            'height.required' => 'La altura es obligatoria.',
            'height.integer' => 'La altura debe ser un número entero.',
            'height.between' => 'La altura debe estar entre 120 y 230 cm.',
        ];
    }

    private function getValidationRules()
    {
        return [
            'name' => 'required|string|max:255|unique:users,name',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', 'string', 'min:8', 'regex:/[0-9]/'],
            'birthdate' => 'required|date',
            'weight' => 'required|numeric|between:40,200',
            'height' => 'required|integer|between:120,230'
        ];
    }
}
