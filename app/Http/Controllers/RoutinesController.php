<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutinesController extends Controller
{
    public function showRoutines()
    {
        return view('routines');
    }


    public function showAddRoutines()
    {
        return view('add_routines');
    }
    public function addRoutine(Request $request)
    {
        $SUCCESS_MSG = "¡Rutina creada con éxito!";

        $user = Auth::id();

//        $exercises = $request->input('exercises');

        $routineName = $request->input('routineName');
        $routineDescription = $request->input('routineDescription');



        Routine::create([
            'name' => $routineName,
            'description' => $routineDescription,
            'user_id' => $user
        ]);

        return response()->json(['success' => true, 'message' => $SUCCESS_MSG, 'operation' => 'add_routine']);
    }
}
