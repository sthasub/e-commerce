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
        $existingUser = User::where('google_id', $google_user->id)->first();
        if ($existingUser) {
            Auth::login($existingUser);
            return redirect('/');
        } else {
//           dd($google_user);
            $database_user = User::updateOrCreate([
                'email' => $google_user->email
            ], [
                'google_id' => $google_user->id,
                'name' => $google_user->name,
                'google_token' => $google_user->token,
                'google_refresh_token' => $google_user->refreshToken,
            ]);
            Auth::login($database_user);
            return redirect('/');
        }
    }

    function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    function facebookCallback()
    {
        $facebook_user = Socialite::driver('facebook')->stateless()->user();
//        dd($facebook_user);
        $database_user = User::updateOrCreate([
            'email' => $facebook_user->email,
        ], [
                'facebook_id' => $facebook_user->id,
                'facebook_token' => $facebook_user->token,
                'facebook_refresh_token' => $facebook_user->refreshToken,
                'name' => $facebook_user->name
            ]

        );
        Auth::login($database_user);
        return redirect('/');
    }

    function githubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    function githubCallback()
    {
        $github_user = Socialite::driver('github')->stateless()->user();
//       dd($github_user);
        $database_user = User::updateOrCreate([
            'email' => $github_user->email],
            ['github_id' => $github_user->id,
                'github_token' => $github_user->token,
                'github_refresh_token' => $github_user->refreshToken,
                'name' => $github_user->nickname,
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
