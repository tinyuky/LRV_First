<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function search(Request $search){
    	if($search->search==null){
    		$users	 = User::paginate(5);
         	return view('adminhome',['posts'=>$users]);
    	}
    	else{
    		$str = str_replace('%40', '@', $search->search);
    		$users	 = User::where('username','like','%'.$str.'%')
    					->orwhere('firstname','like','%'.$str.'%')
    						->orwhere('email','like','%'.$str.'%')->sortable()->paginate(2);
         	return view('adminhome',['posts'=>$users]);
    	}
    }
}
