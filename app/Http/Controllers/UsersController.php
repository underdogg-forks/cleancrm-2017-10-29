<?php

namespace App\Http\Controllers;

use App\Role;
use App\RoleUser;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    use ResetsPasswords;

    public function profile()
    {
        return view('users.profile');
    }

    public function config()
    {
        return view('users.config');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderby('created_at', 'desc')->paginate(5);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->except(['role_id']);
        $inputs['password'] = bcrypt($inputs['password']);
        $user = User::create($inputs);
        foreach ($request->input('role_id') as $key => $value) {
            $exist = RoleUser::where('role_id', $value)->where('user_id', $user->id)->first();
            if (!$exist) {
                $user->attachRole($value);
            }
        }
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
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
        $user = User::where('id', $id)->update($request->except(['_token', '_method', 'submit', 'role_id']));
        $user = User::find($id);
        $user->detachRoles($user->roles);
        foreach ($request->input('role_id') as $key => $value) {
            $exist = RoleUser::where('role_id', $value)->where('user_id', $user->id)->first();
            if (!$exist) {
                $user->attachRole($value);
            }
        }
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/users');
    }

    public function password()
    {
        return view('users.password');
    }

    public function change(Request $request)
    {
        $password = $request->input('password');

        $user = Auth::user();
        $user->password = bcrypt($password);
        $user->save();

        session()->flash('message', 'You password has been update.');

        return redirect()->back();
    }
}
