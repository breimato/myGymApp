<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RoutinesController extends Controller
{
    public function showRoutines()
    {
        $routines = Routine::with('exercises')->where('user_id', Auth::id())->get();
        return view('routines', ['routines' => $routines]);
    }


    public function showAddRoutines()
    {
        return view('add_routines');
    }
    public function addRoutine(Request $request)
    {
        $SUCCESS_MSG = "¡Rutina creada con éxito!";
        $ERROR_MSG = "¡Ha habido un error al crear la rutina!";
        $cont = 1;
        $attachData = [];
        $user = Auth::id();

        $routineName = $request->input('routineName');
        $routineDescription = $request->input('routineDescription');
        $exercises = $request->input('exercises');

        $data = [
            'name' => $routineName,
            'description' => $routineDescription,
            'user_id' => $user
        ];

        $validator = Validator::make($data, $this->getRoutinesValidationRules(), $this->getRoutinesValidationMessages());

        if ($validator->fails()) return response()->json(['errors' => $validator->errors(), 'message' => $ERROR_MSG,], 422);

        $routine = Routine::create($data);

        foreach ($exercises as $exercise) {
            $attachData[] = ['order_num' => $cont, 'exercise_id' => $exercise, 'routine_id' => $routine->id];
            $cont++;
        }

        DB::table('routine_exercises')->insertOrIgnore($attachData);

        return response()->json(['success' => true, 'message' => $SUCCESS_MSG, 'operation' => 'add_routine']);
    }


    private function getRoutinesValidationMessages()
    {
        return [
            'name.required' => 'El nombre de la rutina es obligatorio.',
            'name.max' => 'El nombre de usuario no debe exceder los 255 caracteres.',
            'name.unique' => 'Este nombre de rutina ya está en uso.',

            'description.required' => 'La descripcion de la rutina es obligatoria.',
            'description.string' => 'La descripcion de la rutina debe ser una cadena de texto.',
            'description.max' => 'La descripcion de la rutina no debe exceder los 255 caracteres.',

            'user_id.required' => 'Tienes que loggearte como usuario para poder crear una rutina.',
            'user_id.integer' => 'El id debe ser un número entero.',
        ];
    }

    private function getRoutinesValidationRules()
    {
        return [
            'name' => 'required|max:255|unique:routines,name',
            'description' => 'required|string|max:255',
            'user_id' => 'required|integer',
        ];
    }



}
