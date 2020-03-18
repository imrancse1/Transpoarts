<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\RawSupplier;

class RawSupplierController extends Controller
{
    public function index(){
    	$suppliers = RawSupplier::all();
    	return view('Backend.supplier.supplier-index',compact('suppliers'));
    }

    public function createSupplier(){
    	return view('Backend.supplier.supplier-create');
    }

    public function storeSupplier(Request $request){

    	$this->validate($request,[
    		'supplier_name' => 'required',
    		'supplier_phone' => 'required',
    		'supplier_address' => 'required',
    		'supplier_company' => 'required',

    	]);

    	$data = new RawSupplier();
    	$data->supplier_name = $request->supplier_name;
    	$data->supplier_phone = $request->supplier_phone;
    	$data->supplier_address = $request->supplier_address;
    	$data->supplier_company = $request->supplier_company;
    	$data->save();

    	 return redirect()->route('/supplier')
                        ->with('success','Supplier created successfully.');

    }

    public function editSupplier($supplierId)
    {
       // echo $productId;
         $suppliers = RawSupplier::where('raw_supplier_id',$supplierId)->first();
         return view('Backend.supplier.supplier-edit',compact('suppliers'));
    }

    public function updateSupplier(Request $request,$supplierId)
    {
        //return $request->all();
        try{
            $updateSupplier = RawSupplier::where('raw_supplier_id',$supplierId)
            ->update([
                'supplier_name' => $request->supplier_name,
                'supplier_phone' => $request->supplier_phone,
                'supplier_address' => $request->supplier_address,
                'supplier_company' => $request->supplier_company
                ]);
           if($updateSupplier){
                Session::flash('success','Supplier Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('/supplier');
       
    }



    public function deleteSupplier($supplierId)
    {
        try{
             $supplier = RawSupplier::where('raw_supplier_id',$supplierId)
                ->delete();
            if($supplier){
                Session::flash('success','Supplier Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/supplier');
       
    }


    
}
