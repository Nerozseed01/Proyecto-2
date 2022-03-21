<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    // Middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        // dd( Auth::user()->email );


        if( Auth::user()->email == 'eduardo@gmail.com' ){
            return view('dashboard.dashboarIndex');
        } else {
            return redirect()->route('home');
        }
    }




}
