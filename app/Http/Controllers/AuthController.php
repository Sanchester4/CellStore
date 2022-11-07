<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
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
            return view('index');
            // if($user->hasRole('user')){
            //     return redirect()->route('projectStudent');
            // }
            // else if($user->hasRole('teacher')){
            //     return redirect()->route('getProjects');
            // }
            // else{
            //     return redirect()->route('getStudents');}
        }
               
        return view('login');
    }

    public function register(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $hashed = Hash::make($request->password);
        $request->merge([
            'password' => $hashed,
        ]);
        $user = User::create(request(['name', 'email', 'password']));
        
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