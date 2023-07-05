<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cAdmin = User::where('role' , 'admin')->count();
        $cPemimpin = User::where('role', 'pemimpin')->count();
        $cPerawat = User::where('role', 'perawat')->count();
        $cUser = User::all()->count();
        $dataPasien = Patient::all();

        return view('admin.dashboard.home', compact('cAdmin','cPemimpin','cPerawat','cUser','dataPasien'));
    }
}
