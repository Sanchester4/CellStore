<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $user = User::where('email', $request->input('email'))->first();

            if (!$user || !Hash::check($request->input('password'), $user->password)) {
                return redirect(route('login'))->withErrors([
                    'login' => 'Email or password is incorrect!'
                ])->withInput();
            }
            $request -> session() -> put('loginId', $user -> id);
            Auth::login($user);
             if($user->hasRole('user')){
                return redirect()->route('index');
            }
            else if($user->hasRole('admin')){
                // return redirect()->route('Admin.dashboard');
                return redirect()->route('dashboard');
            }
            else{
                return redirect()->route('404');}
                return view('index');
        }

               
        return view('login');
    }

    public function register(Request $request)
    {
        $user = Auth::user();
        $user = new User;
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $hashed = Hash::make($request->password);
        $request->merge([
            'password' => $hashed,
        ]);
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->assignRole('user');
        $user->save();
        // $user = User::create(request(['name', 'email', 'password']));
        auth()->login($user);
        return view('index');
    }
     

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return view('index');
    }
}