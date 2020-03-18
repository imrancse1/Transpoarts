<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SupplierBill;
use App\Bank;
use App\RawSupplier;
use App\Purchase;
use App\Product;
use Session;

class SupplierBillController extends Controller
{
     public function index(){

    	$supplierBill = SupplierBill::join('raw_suppliers','raw_suppliers.raw_supplier_id','=','supplier_bills.raw_supplier_id')
    	->join('banks','banks.bank_id','=','supplier_bills.bank_id')
    	->join('purchases','purchases.purchase_id','=','supplier_bills.purchase_id')
    	
    	
    	->get();
     	
        // echo "<pre>";
        // print_r($supplierBill);
        // exit();           
    	return view('Backend.supplierBill.supplierBill-index',compact('supplierBill'));
	}

	public function create(){
     	$suppliers = RawSupplier::all();
        $banks = Bank::all();
        $purchase = Purchase::all();
        // $purchases = Product::join('products','products.product_id','=','purchases.purchase_id')
        // $purchases = Product::join('purchases','purchases.product_id','=','products.product_id')
        // ->get();
    	return view('Backend.supplierBill.supplierBill-create',compact('suppliers','banks','purchase'));
    }

    public function storeSupplierBill(Request $request){

    	$this->validate($request,[
    		'date' => 'required',
    		'raw_supplier_id' => 'required',
            'purchase_id' => 'required',
    		'payment_mode' => 'required',
    		'pay_amount' => 'required',

    	]);

    	$data = new SupplierBill();
    	$data->date = $request->date;
    	$data->raw_supplier_id = $request->raw_supplier_id;
        $data->purchase_id = $request->purchase_id;
    	$data->payment_mode = $request->payment_mode;
    	$data->bank_id = $request->bank_id;
    	$data->account_name = $request->account_name;
    	$data->account_number = $request->account_number;
    	$data->pay_amount = $request->pay_amount;
    	$data->description_note = $request->description_note;
    	$data->save();

    	 return redirect()->route('/supplierBill')
                        ->with('success','Supplier Bill created successfully.');

    }

    public function editSupplierBill($supplierBillId)
    {
        // echo $supplierBillId;
        // exit();
        $supplierBill = SupplierBill::where('supplierBill_id',$supplierBillId)->first();
        // echo "<pre>";
        // print_r($supplierBill);
        // exit();  

         //$purchase = Purchase::all();   

        $purchase = Purchase::get([
            'purchases.*'
        ]); 
        $suppliers = RawSupplier::get([
            'raw_suppliers.*'
        ]);

        $banks = Bank::get([
            'banks.*'
        ]); 
        
        return view('Backend.supplierBill.supplierBill-edit',compact('supplierBill','suppliers','banks','purchase'));
    }

    public function updateSupplierBill(Request $request,$supplierBillId)
    {
        //return $request->all();

        try{
             $updateSupplierBill = SupplierBill::where('supplierBill_id',$supplierBillId)
            ->update([

                'date' => $request->date,
                'raw_supplier_id' => $request->raw_supplier_id,
                'purchase_id' => $request->purchase_id,
                'payment_mode' => $request->payment_mode,
                'bank_id' => $request->bank_id,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
                'pay_amount' => $request->pay_amount,
                'description_note' => $request->description_note
                ]);

           if($updateSupplierBill){
                Session::flash('success','Supplier Bill Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('/supplierBill');
       
    }

    public function deleteSupplierBill($supplierBillId)
    {
        try{
             $supplierBill = SupplierBill::where('supplierBill_id',$supplierBillId)
                ->delete();
            if($supplierBill){
                Session::flash('success','Supplier Bill Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/supplierBill');
       
    }


}
