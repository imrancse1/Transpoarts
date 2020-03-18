<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\RawSupplier;
use App\Transport;
use App\Purchase;
use App\Wirehouse;
use App\LessPurchase;
use App\WorkOrder;
use Session;


class WorkOrderController extends Controller
{
	public function workOrder(){
		$workOrder = WorkOrder::join('raw_suppliers','raw_suppliers.raw_supplier_id','=','work_orders.raw_supplier_id')
		
		//->join('purchases','purchases.purchase_id','=','work_orders.purchase_id')
		->get();

		 // echo "<pre>";
   //      print_r($workOrder);
   //      exit();

		return view('Backend.workOrder.workOrder',compact('workOrder'));
	}

	public function createWorkOrder(){
		$suppliers = Purchase::join('raw_suppliers','raw_suppliers.raw_supplier_id','=','purchases.raw_supplier_id')
		->get();
     	return view('Backend.workOrder.workOrderCreate',compact('suppliers'));
	}

	
	public function saveWorkOrder(Request $request){
		
		$this->validate($request,[
		   'raw_supplier_id' => 'required' ,
           'product_id' => 'required' ,
           
           
           'purchase_id' => 'required' ,
           
           
           'word_remain_quantity' => 'required'         
           
		]);
       
            
		$data = new WorkOrder();
		$data->raw_supplier_id = $request->raw_supplier_id;
        $data->product_id = $request->product_id; 
        $data->purchase_id = $request->purchase_id;	
        $data->word_remain_quantity = $request->word_remain_quantity;
        // echo "<pre>";
        // print_r($data);
        // exit(); 
		$data->save();

		 return redirect()->route('/workOrder')
                    ->with('success','Work Order created successfully.');
       }

	public function supplierWiseProduct($productId)
    {
         return Purchase::join('products','products.product_id','=','purchases.product_id')
                        // ->join('inventories','inventories.product_id','=','products.product_id')    
                         ->where('products.product_id',$productId)
                         ->get([
                            'products.product_id',
                            'products.product_name',
                            
                           ]);
         
    }

	public function productWiseOrder($supplierId)
    {
          return Purchase::join('raw_suppliers','raw_suppliers.raw_supplier_id','=','purchases.raw_supplier_id')
                        // ->join('inventories','inventories.product_id','=','products.product_id')    
                         ->where('raw_suppliers.raw_supplier_id',$supplierId)
                         ->get([
                            'raw_suppliers.raw_supplier_id',
                            
                            'purchases.purchase_id',
                            'purchases.order_quantity',
                            
                           ]);
         
    }

	public function supplierWiseRemain($supplierId)
    {
          return Purchase::join('raw_suppliers','raw_suppliers.raw_supplier_id','=','purchases.raw_supplier_id')
                        // ->join('inventories','inventories.product_id','=','products.product_id')    
                         ->where('raw_suppliers.raw_supplier_id',$supplierId)
                         ->get([
                            'raw_suppliers.raw_supplier_id',
                            
                            'purchases.purchase_id',
                            'purchases.remain_quantity',
                            
                           ]);
         
    }




			// public function productWiseOrder($productId)
			//     {
			//           return Purchase::join('products','products.product_id','=','purchases.product_id')
			//                         // ->join('inventories','inventories.product_id','=','products.product_id')    
			//                          ->where('products.product_id',$productId)
			//                          ->get([
			//                             'products.product_id',
			//                             'products.product_name',  
			//                             'purchases.purchase_id',
			//                             'purchases.order_quantity',
			                            
			//                            ]);
			         
			//     }




}