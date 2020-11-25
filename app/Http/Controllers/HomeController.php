<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('adminLTE.dashboard');
    }


    public function generatePdf()
    {
        return view('');
    }

    public function sheetEditor()
    {
        return view('editor');
    }


    public function logout()
    {

        Auth::logout();
        return redirect('/login');
    }
}
