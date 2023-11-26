<?php

namespace App\Http\Controllers;

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
    public function newRoutine()
    {

    }
}
