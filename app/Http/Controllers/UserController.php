<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Support\Facades\Redirect;
use Session;

class UserController extends Controller
{

    public function index()
    {

        $admin = Admin::with('roles')->orderBy('admin_id','DESC')->paginate(5);
        return view('Admin.users.all_users')->with(compact('admin'));
    }
//    public function assign_roles(Request $request){
//        $data = $request->all();
//        $user = Admin::where('admin_email',$data['admin_email'])->first();
//        $user->roles()->detach();
//        if($request['author_role']){
//            $user->roles()->attach(Roles::where('name','author')->first());
//        }
//        if($request['user_role']){
//            $user->roles()->attach(Roles::where('name','user')->first());
//        }
//        if($request['admin_role']){
//            $user->roles()->attach(Roles::where('name','admin')->first());
//        }
//        return redirect()->back();
//    }
}
