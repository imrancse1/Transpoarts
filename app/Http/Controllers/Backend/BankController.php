<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank;
use Session;


class BankController extends Controller
{
    public function index(){
    	$bank = Bank::all();
    	return view('Backend.bank.bank-index',compact('bank'));
    }

    public function createBank(){
    	return view('Backend.bank.bank-create');
    }

    public function storeBank(Request $request){

    	$this->validate($request,[
    		'bank_name' => 'required',
    		'bank_licence' => 'required',
    		'bank_address' => 'required'

    	]);

    	$data = new Bank();
    	$data->bank_name = $request->bank_name;
    	$data->bank_licence = $request->bank_licence;
    	$data->bank_address = $request->bank_address;
    	$data->save();

    	 return redirect()->route('/bank')
                        ->with('success','Bank created successfully.');
    }

    public function editBank($bankId){
    	 // echo $productId;
         $bank = Bank::where('bank_id',$bankId)->first();
         return view('Backend.bank.bank-edit',compact('bank'));
    }



	public function updateBank(Request $request,$bankId)
	    {
	        //return $request->all();
	        try{
	            $updateBank = Bank::where('bank_id',$bankId)
	            ->update([
	                'bank_name' => $request->bank_name,
	                'bank_licence' => $request->bank_licence,
	                'bank_address' => $request->bank_address
	                ]);
	           if($updateBank){
	                Session::flash('success','Bank Updated successfully!!!');
	           }else {
	                Session::flash('error','Something Went Wrong!!!');
	           } 
	        }catch(\Exception $e){
	            //return $e;
	            Session::flash('error',$e->errorInfo[2]);
	        }
	        return redirect()->route('/bank');
	       
	    }

    public function deleteBank($bankId)
    {
        try{
             $wirehouse = Bank::where('bank_id',$bankId)
                ->delete();
            if($wirehouse){
                Session::flash('success','Bank Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/bank');
       
    }
}
