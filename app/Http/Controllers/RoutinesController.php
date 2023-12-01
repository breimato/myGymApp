<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'exercises' => 'required'
        ]);


    }
}
