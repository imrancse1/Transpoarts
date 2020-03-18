<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wirehouse;
use App\RawSupplier;
use Session;

class WirehouseController extends Controller
{
    public function index(){
    	// $wirehouse = Wirehouse::join('raw_suppliers','raw_suppliers.raw_supplier_id','=','wirehouses.raw_supplier_id')
     //    ->get();
        $wirehouse = Wirehouse::all();
    	return view('Backend.wirehouse.wirehouse-index',compact('wirehouse'));
    }

    public function createWirehouse(){
        //$suppliers = RawSupplier::all();
    	return view('Backend.wirehouse.wirehouse-create');
    }

    public function storeWirehouse(Request $request){

    	$this->validate($request,[
    		'wirehouse_name' => 'required',
            
    		'wirehouse_address' => 'required'

    	]);

    	$data = new Wirehouse();
    	$data->wirehouse_name = $request->wirehouse_name;
        // $data->raw_supplier_id = $request->raw_supplier_id;
    	$data->wirehouse_address = $request->wirehouse_address;
    	$data->save();

    	 return redirect()->route('/wirehouse')
                        ->with('success','Wirehouse created successfully.');
    }

    public function editWirehouse($wirehouseId){
    	 // echo $productId;
         $wirehouse = Wirehouse::where('wirehouse_id',$wirehouseId)->first();

          // $suppliers = RawSupplier::get([
          //   'raw_suppliers.*'
          //   ]);
         return view('Backend.wirehouse.wirehouse-edit',compact('wirehouse'));
    }



	public function updateWirehouse(Request $request,$wirehouseId)
	    {
	        //return $request->all();
	        try{
	            $updateWirehouse = Wirehouse::where('wirehouse_id',$wirehouseId)
	            ->update([
	                'wirehouse_name' => $request->wirehouse_name,
                    // 'raw_supplier_id' => $request->raw_supplier_id,
	                'wirehouse_address' => $request->wirehouse_address
	                ]);
	           if($updateWirehouse){
	                Session::flash('success','Wirehouse Updated successfully!!!');
	           }else {
	                Session::flash('error','Something Went Wrong!!!');
	           } 
	        }catch(\Exception $e){
	            //return $e;
	            Session::flash('error',$e->errorInfo[2]);
	        }
	        return redirect()->route('/wirehouse');
	       
	    }

    public function deleteWirehouse($wirehouseId)
    {
        try{
             $wirehouse = Wirehouse::where('wirehouse_id',$wirehouseId)
                ->delete();
            if($wirehouse){
                Session::flash('success','Wirehouse Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/wirehouse');
       
    }
}
