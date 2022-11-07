<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function dashboard(){
        $user = Auth::user();
        return view ('Admin.dashboard');
    }

    public function deletePhone($id)
    {
        Phone::find($id)->delete();
        return redirect()->back()->with('message', 'The phone has been deleted successfully!');   
    }
}