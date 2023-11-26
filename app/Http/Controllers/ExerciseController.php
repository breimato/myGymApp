<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        return Exercise::all();
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

        return Exercise::create($request->validated());
    }

    public function show(Exercise $exercise)
    {
        return $exercise;
    }

    public function update(Request $request, Exercise $exercise)
    {
        $request->validate([

        ]);

        $exercise->update($request->validated());

        return $exercise;
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();

        return response()->json();
    }
}
