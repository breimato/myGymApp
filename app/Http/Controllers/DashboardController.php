<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{

    public function showDashboard(){
        $user = auth()->user();
        return view('dashboard', compact('user'));
    }
}
