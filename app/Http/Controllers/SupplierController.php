<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
Use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
Use Session;
Use Illuminate\Support\Facades\Redirect;
session_start();

class SupplierController extends Controller
{
    public function AuthLogin(){

        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }

//        $admin_id = Auth::id();
//        if($admin_id){
//            return Redirect::to('dashboard');
//        }else{
//            return Redirect::to('admin')->send();
//        }
    }
    public function add_supplier_product()
    {
        $this->AuthLogin();
        return view('Admin.Supplier.add_supplier_product');
    }
    public function all_supplier_product()
    {
        $this->AuthLogin();
        $all_supplier_product = DB::table('tbl_suppliers')->get();
        $manage_supplier_product = view('Admin.Supplier.all_supplier_product')->with('all_supplier_product', $all_supplier_product);
        return view('admin_layout')->with('Admin.Supplier.all_supplier_product', $manage_supplier_product);
    }

    //display ID with first 4 characters

    public  function  validateSupplier()
    {
        $this->validate(request(),[
            'supplierName' => 'required|max:100',
            'contactTitle' => 'required|max:100',
            'supplierAddress' => 'required|max:100',
            'supplierEmail' => 'required|max:100',
            'supplierPhone' => 'required|max:100',
            'supplierFax' => 'required|max:100',

        ]);
    }

    public function save_supplier_product(Request $requesty, Supplier $supplier )
    {
        $this->AuthLogin();
        $this->validateSupplier();
          Supplier::create([
            'supplierName' => $requesty->supplierName,
            'contactTitle' => $requesty->contactTitle,
            'supplierAddress' => $requesty->supplierAddress,
            'supplierEmail' => $requesty->supplierEmail,
            'supplierPhone' => $requesty->supplierPhone,
            'supplierFax' => $requesty->supplierFax,
              ]);
        Session::put('message', '  Supplier added successfully');
        return redirect::to('/add-supplier-product');


    }
    public function unactive_brand_product($brandID)
    {
        $this->AuthLogin();
        DB::table('brand')->where('brandID', $brandID)->update(['brandStatus' => 0]);
        Session::put('message', 'Brand unactive successfully');
        return redirect::to('/all-brand-product');
    }
    public function active_brand_product($brandID)
    {
        $this->AuthLogin();
        DB::table('brand')->where('brandID', $brandID)->update(['brandStatus' => 1]);
        Session::put('message', 'Brand active successfully');
        return redirect::to('/all-brand-product');
    }
    public function edit_supplier_product($supplierID )
    {

        $this->AuthLogin();
        $edit_supplier_product = DB::table('tbl_suppliers')->where('supplierID', $supplierID)->get();
        $manage_supplier_product = view('Admin.Supplier.edit_supplier_product')->with('edit_supplier_product',   $edit_supplier_product);
        return view('admin_layout')->with('Admin.Supplier.edit_supplier_product', $manage_supplier_product);

    }
    public function delete_supplier_product(Supplier $supplier, $supplierID)
    {
        $this->AuthLogin();
        $supplier->where('supplierID', $supplierID)->delete();
        Session::put('message', 'Supplier deleted successfully');
        return redirect::to('/all-supplier-product');
    }


    public  function  update_supplier_product(Request $requesty, Supplier $supplier)
    {
        $this->AuthLogin();
        $supplier->where('supplierID', $requesty->supplierID)->update([
            'supplierName' => $requesty->supplierName,
            'contactTitle' => $requesty->contactTitle,
            'supplierAddress' => $requesty->supplierAddress,
            'supplierEmail' => $requesty->supplierEmail,
            'supplierPhone' => $requesty->supplierPhone,
            'supplierFax' => $requesty->supplierFax,
        ]);
        Session::put('message', 'Supplier updated successfully');
        return redirect::to('/all-supplier-product');
    }
}
