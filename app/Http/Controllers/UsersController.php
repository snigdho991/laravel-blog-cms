<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use App\User;
use App\Profile;

class UsersController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('admin');
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email'
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt('password')
        ]);

        $profile = Profile::create([
            'user_id'  => $user->id,
            'avatar'   => 'uploads/avatar/1.jpg'
        ]);

        Session::flash('success', 'User added successfully !');
        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

        if(Auth::id() !== $user->id){

            if ($user->admin !== 1) {
               
                $user->profile->delete();
                $user->delete();

                Session::flash('success', 'User deleted successfully !');
                return redirect()->back();

            } else {
                Session::flash('info', 'You can not delete Admin profile !');
                return redirect()->back();
            }

        } else {
            Session::flash('info', 'You can not delete your own profile !');
            return redirect()->back();
        }        
        
    }

    public function admin($id)
    {
        $user = User::find($id);

        if(Auth::id() !== $user->id){
            $user->admin = 1;

            $user->save();

            Session::flash('success', 'User has been added into admin panel !');
            return redirect()->back();
        } else {
            Session::flash('info', 'You can not modify your own role !');
            return redirect()->back();
        }  
    }

    public function remove_admin($id)
    {
        $user = User::find($id);

        if(Auth::id() !== $user->id){
            $user->admin = 0;

            $user->save();

            Session::flash('info', 'User has been removed from admin role !');
            return redirect()->back();
            
        } else {
            Session::flash('info', 'You can not modify your own role !');
            return redirect()->back();
        }  
    }
}
