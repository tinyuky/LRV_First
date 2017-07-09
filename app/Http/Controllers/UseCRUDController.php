<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UseCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CRUD.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,array(
            'username' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            ));

        //save
        User::create([
            'username' => $request['username'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            ]);

        $user = User::where('email',$request->email)->first();
        //redirect
        return redirect()->route('admin.home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //bỏ trang show nên chuyển qua destroy
        return $this->destroy($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = User::find($id);
        return view('CRUD.edit')->withPost($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();
        $this ->validate($request,[
            'username' => 'string|max:255',
            'firstname' => 'string|max:255',
            'lastname' => 'string|max:255',
            'password' => 'required|string|min:6',
            ]);
        Validator::make($data, [
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
                ],
            ]);

        $user = User::find($id);
        $user->username = $request->input('username');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('admin.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.home');
    }
}
