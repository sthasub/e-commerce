<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    function googleCallback()
    {
        $google_user = Socialite::driver('google')->stateless()->user();

//           dd($google_user);
        $database_user = User::updateOrCreate([
            'google_id' => $google_user->id,
        ], [
            'name' => $google_user->name,
            'email' => $google_user->email,
            'google_token' => $google_user->token,
            'google_refresh_token' => $google_user->refreshToken,
        ]);
        Auth::login($database_user);

        return redirect('/');
    }

    //
    function login(Request $req)
    {
//        $user = User::where(['email'=>$req->email])->first();
//        if(!$user || !Hash::check($req->password, $user->password)){
//            return "username & password is not matched";
//        }else{
//            $req->session()->put('user',$user);
//            return redirect('/');
//        }
        $credentials = ['email' => $req->email, 'password' => $req->password];
        $result = Auth::attempt($credentials);
        if ($result) {
            return redirect('/');
        } else {
            return "username & password is not matched";
        }
    }

    function register(Request $req)
    {
        $user = new User();

        try {
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $result = $user->save();
            if ($result) {
                return redirect('/login');
            } else {
                return "Registration Incomplete !";
            }
        } catch (\Exception $e) {
            return view("registration")->with('regis', 'User already exist');
        }
    }

    function logout(Request $req)
    {
//   Session::forget('user');

//        if (Auth::user()->password == null) {
//            $token = Auth::user()->delete();
//        } else {
//
//        }
//        Auth::user()->delete();
        Auth::logout();
        return redirect('login');
    }

}
