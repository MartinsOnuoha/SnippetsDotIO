<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use Illuminate\Http\Request;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slug = Auth::user()->slug;
        $user = User::where('slug', $slug)->first();

        $user = Auth::user();

        return view('home')->with('user', $user);
    }

    public function discover()
    {
        $data;

        $talents = User::where('user_type', 'talent')->get();
        $investors = User::where('user_type', 'inverstor')->get();

        if (Auth::user()->isInvestor()) {
            $data = $talents;
        } else {
            $data = $investors;
        }

        return view('user.discover')->with('data', $data);
    }
}
