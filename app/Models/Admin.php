<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//class Admin extends Authenticatable
class Admin extends model
{

    protected  $table = 'tbl_employees';
    protected $fillable = ['admin_name', 'admin_email', 'admin_password','Phone','admin_status'];
    public $timestamps = false;
    protected  $primaryKey = 'admin_id';

    public function roles()
    {
        return $this->belongsToMany('app\Models\Roles');
    }

   public function getAuthPassword()
    {
        return $this->admin_password;
    }
//    public function hasAnyRoles($roles){
//
//        if(is_array($roles)){
//            foreach($roles as $role){
//                if($this->hasRole($role)){
//                    return true;
//                }
//            }
//        }else{
//            if($this->hasRole($roles)){
//                return true;
//            }
//        }
//        return false;
//    }
//    public function hasRole($role){
//        if($this->roles()->where('name',$role)->first()){
//            return true;
//        }
//        return false;
//    }
}
