<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::sortable()->paginate(5);
        return view('adminhome',['posts'=>$users]);
    }
}
