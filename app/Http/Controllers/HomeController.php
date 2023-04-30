<?php

namespace App\Http\Controllers;
use Auth;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth/login');
    }

    public function home() 
    {
        return view('home');
    }

    public function setAvailability(Request $request) {
        $is_available = $request->input('is_available');
        return Auth::user()->update([
            'is_available' => $is_available
        ]);
    }
}
