<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=user::all();
        return view('admin.users.users')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Roles=Role::all();
       return view('admin.users.add_user')->with('Roles',$Roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>['required'],
            'email'=>['required','email'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $user= user::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        $user->attachRole($request->role);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  show profile user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = user::find($id);
        return view('admin.users.profile')->with('user',$user);
    }
    /**
     * Update user .
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_profile(Request $request, $id)
    {
         $user = user::find($id);
          $user->name = $request->name;
          if(!empty($request->password))
            {
          $user->password = Hash::make($request->password);
            }
            $user->save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Roles=Role::all();
        $user = user::find($id);
        return view('admin.users.edit')->with('user',$user)
                                       ->with('Roles',$Roles);
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
         $user = user::find($id);
          $user->name = $request->name;
          if(!empty($request->password))
            {
          $user->password = Hash::make($request->password);
            }
            $user->save();
            $user->syncRoles($request->role);
             return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = user::find($id);
       $user->delete();
        return redirect()->back();
    }
}
