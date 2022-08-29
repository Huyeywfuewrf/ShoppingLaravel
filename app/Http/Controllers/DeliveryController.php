<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\wards;
use App\Models\Feeship;
use Illuminate\Support\Facades\Auth;
use Session;
session_start();
Use Illuminate\Support\Facades\Redirect;


class DeliveryController extends Controller
{
    public function AuthLogin(){



//        $admin_id = Auth::id();
//        if($admin_id){
//            return Redirect::to('dashboard');
//        }else{
//            return Redirect::to('admin')->send();
//        }
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public  function  delivery(Request $request){
        $this->AuthLogin();
        $city = City::orderBy('matp','ASC')->get();
        return view('Admin.delivery.add_delivery')->with(compact('city'));
    }
    public  function select_delivery(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        if($data['action']) {
            $output = '';
            if ($data['action'] == "city") {
                $select_province = Province::where('matp', $data['ma_id'])->orderBy('maqh', 'ASC')->get();
                $output.= '<option>-------- Select District/District ----------</option>';
                foreach ($select_province as $key => $province) {
                    $output.= '<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }
            } else {
                $select_wards = Wards::where('maqh', $data['ma_id'])->orderBy('xaid', 'ASC')->get();
                $output.= '<option>-------- Select Commune/Ward ----------</option>';
                foreach ($select_wards as $key => $ward) {
                    $output.= '<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
        }
        echo $output;
    }
    public  function  insert_delivery(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $fee_ship = new Feeship();
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_xaid = $data['wards'];
        $fee_ship->fee_feeship = $data['fee_ship'];
        $fee_ship->save();
    }
    public  function select_feeship(){
        $this->AuthLogin();
         $feeship = Feeship::orderBy('fee_id','ASC')->get();
         $output = '';
         $output .= '<div class="table-responsive">
             <table class="table table-bordered">
                     <thread>
                        <tr>
                            <th>City</th>
                            <th>Province</th>
                            <th>Wards</th>
                            <th>Fee Ship</th>
                        </tr>
                     </thread>
                     <tbody>
                     ';
         foreach ($feeship as $key => $fee) {
             $output.='
                       <tr>
                          <td>'.$fee->city->name_city.'</td>
                          <td>'.$fee->province->name_quanhuyen.'</td>
                          <td>'.$fee->wards->name_xaphuong.'</td>
                          <td contenteditable data-feeship_id="'.$fee->fee_id.'" class="fee_feeship_edit">'.number_format($fee->	fee_feeship,0,',','.'). 'VNĐ</td>
                       </tr>
                       ';
             }
             $output .='
                     </tbody>
                     </table> </div>
        ';
         echo $output;
    }
    public  function  update_delivery(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $fee_ship = Feeship::find($data['feeship_id']);
        $fee_value = rtrim($data['fee_value'] ,'.');
        $fee_ship->fee_feeship = $fee_value;
        $fee_ship->save();
    }
//        $this->AuthLogin();
//        $data = $request->all();
//        $fee_ship = Feeship::find($data['feeship_id']);
//        $fee_value = rtrim($data['fee_value'],'.');
//        $fee_ship->fee_feeship = $fee_value;
//        $fee_ship->save();

}

