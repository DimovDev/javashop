<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('front.sessions.index');
    }

    public function store(Request $request)
    {

        //validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = Request(['email', 'password']);
        if (!auth()->attempt($credentials)) {
            return back()->withErrors([
                    'message' => 'Wrong Email or Password please try again']
            );
        }

        $request->session()->flash('msg', 'You have been logged in');

        return redirect('/user/profile');
    }
    public function logout(){
        auth()->logout();

        session()->flash('msg','You have been logged out');

        return redirect('/user/login');
    }
}
