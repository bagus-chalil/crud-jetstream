<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Inertia\Inertia;

class AdminDashboardController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
}
