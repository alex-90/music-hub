<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(UserLoginRequest $req)
    {
        $username = $req->input('username');
        $password = $req->input('password');

        
        // $user = User::where('username', $username)->where('password1', $hash)->first();
        $user = User::where('username', $username)->first();

        if(!$user){
            return back()->with('err', 'Username incorrect!')->withInput();
        }

        if (!Hash::check($password, $user->password)) {
            return back()->with('err', 'Password incorrect!')->withInput();
        }

        $is_active = $user->is_active;

        if (!$is_active){
            return redirect()->route('sign-in')->with('err', 'Username blocked!');
        }

        Auth::login($user, $req->get('remember'));

        $is_admin = $user->is_admin;
        
        if ($is_admin){
            return redirect()->route('admin');
        }

        return redirect()->route('home');
    }

    public function logout(Request $req)
    {
        Auth::logout();

        return redirect()->route('admin');
    }



    public function signup(UserCreateRequest $req)
    {
        $username = $req->input('username');
        $password = $req->input('password');
        $email = $req->input('email');
        $fio = $req->input('fio');
        
        $user = User::where('username', $username)->where('password', $password)->first();

        if ($user) {
            return redirect()->route('sign-in')->withError('Username already exist!');
        }

        if(!$user){
            $user = new User;

            $user->username = $username;
            $user->password = Hash::make($password);
            $user->email = $email;
            $user->fio = $fio;
            $user->is_active = 1;
            $user->is_admin = 0;
            
            $user->save();

            Auth::login($user, $req->get('remember'));
            
            return redirect()->route('home');
        }        
    }
}
