<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Roles;
use App\Models\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function register_auth()
    {
        return view('Admin.custom_auth.register');
    }

    public function register(Request $request)
    {
        $this->validation($request);
        $data = $request->all();
        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_email = $data['admin_email'];
        $admin->Phone = $data['Phone'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->save();
        return redirect('/register-auth')->with('message', 'Register Successfully');

    }

    public function validation($request)
    {
        $this->validate($request, [
            'admin_name' => 'required|max:255',
            'admin_email' => 'required|email|max:255',
            'Phone' => 'required|max:255',
            'admin_password' => 'required|max:255',
        ]);
    }

    public function login_auth()
    {
        return view('Admin.custom_auth.login_auth');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'admin_email' => 'required|email|max:255',
            'admin_password' => 'required|max:255',
        ]);
        $data = $request->all();
        if (Auth::attempt(['admin_email' => $request->admin_email, 'admin_password' => $request->admin_password])) {
            return redirect('/dashboard');
//            echo Auth::attempt(['admin_email' => $request -> admin_email, 'admin_password' => $request -> admin_password]);
        }

//        if (Auth::attempt(['Email' => $request->put('Email'), 'Passwords' => $request->put('Passwords') ])) {
////            return redirect('/dashboard');
//            echo  Auth::attempt(['Email' => $request->put('Email'), 'Passwords' => $request->put('Passwords') ]);
//        }
        else {
            return redirect('/login-auth')->with('error', 'Email or Password is incorrect');
        }
    }
//    public  function  logout_auth(){
//           Auth::logout();
//            return redirect('/login-auth')->with('message','Logout Successfully');
//
//    }

    public function logOut()
    {
        Auth::logout();
        return redirect('/login-auth')->with('message', 'Logout Successfully');

    }
}
