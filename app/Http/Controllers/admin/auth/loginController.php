<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    //
    private $username;
    private $password;
    private $remember;
    private $resoult;
    private function authentication($username,$password){
        $user = User::where('email', $username)->where('password',$password)->first();
        return $user;
    }

    public function useraccess(Request $request){
        $username =   $request['username'];
        $password= $request['password'];
        $remember = $request['remember'];
        $resoult = $this->authentication($username,$password);
        if (Auth::attempt(['email' => $username, 'password' => $password], $remember)) {
            // The user is being remembered...
        }
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
