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
use Session;
use DB;


class PurchaseController extends Controller
{
    public function index(){

        $purchases = Purchase::join('raw_suppliers','raw_suppliers.raw_supplier_id','=','purchases.raw_supplier_id')
        ->join('products','products.product_id','=','purchases.product_id')
        ->join('wirehouses','wirehouses.wirehouse_id','=','purchases.wirehouse_id')
        ->orderBy('purchases.purchase_id', 'desc')
        
        
        ->get();
        
        // echo "<pre>";
        // print_r($purchases);
        // exit();           
        return view('Backend.purchase.purchase-index',compact('purchases'));
    }

    public function createPurchase(){
        $suppliers = RawSupplier::all();
        $products = Product::all();
        $wirehouses = Wirehouse::all();
        $transports = Transport::all();
        return view('Backend.purchase.purchase-create',compact('suppliers','products','wirehouses','transports'));
    }


public function storePurchase(Request $request){
        $purchaseProducts = Purchase::where('wirehouse_id',$request->wirehouse_id)
                            ->where('product_id',$request->product_id)
                            ->where('raw_supplier_id',$request->raw_supplier_id)
                            ->first([
                                'purchase_id',
                                'raw_supplier_id',
                                'wirehouse_id',
                                'product_id',
                                'inventory_receive'
                                ]);

                // echo "<pre>";
                // print_r($purchaseProducts);
                // exit();           

    if($request->raw_supplier_id !=$purchaseProducts['raw_supplier_id'] && $request->product_id !=$purchaseProducts['product_id'] && $request->wirehouse_id !=$purchaseProducts['wirehouse_id']){
        try{
            $savePurchase = Purchase::insertGetId([
                    'raw_supplier_id' => $request->raw_supplier_id,
                    'product_id'  =>$request->product_id,
                    'wirehouse_id' => $request->wirehouse_id,
                    'date'=> $request->date,
                    'order_quantity'=> $request->order_quantity,
                    'supplier_chalan_qty'=> $request->supplier_chalan_qty,
                    'receive_quantity' => $request->receive_quantity,
                    'weight_quantity'=>$request->weight_quantity,
                    'inventory_receive'=> $request->receive_quantity - $request->weight_quantity,
                    'remain_quantity'=>$request->remain_quantity,
                    'sack_purchase'=> $request->sack_purchase,
                    'moisture'=> $request->moisture,
                    'deduction_quantity' =>$request->deduction_quantity,
                    'bill_quantity'=> $request->bill_quantity,
                    'purchase_rate' => $request->purchase_rate,
                    'transport_vehicle'=> $request->transport_vehicle,
                   'transport_fare'=> $request->transport_fare,
                   'total_payable_amount'=> $request->total_payable_amount
            ]);
           if($savePurchase){
                Session::flash('success','Purchase Save Successfully !!');
            }else {
                Session::flash('error','Something Went Wrong!!');
            } 
    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
    }else if($request->raw_supplier_id ==$purchaseProducts['raw_supplier_id'] && $request->product_id ==$purchaseProducts['product_id'] && $request->wirehouse_id ==$purchaseProducts['wirehouse_id']){
            try{
                $savePurchase = Purchase::where('purchase_id',$purchaseProducts['purchase_id'])
                 ->update([
                    'raw_supplier_id' => $request->raw_supplier_id,
                    'product_id'  =>$request->product_id,
                    'wirehouse_id' => $request->wirehouse_id,
                    'date'=> $request->date,
                    'order_quantity'=> $request->order_quantity,
                    'supplier_chalan_qty'=> $request->supplier_chalan_qty,
                    'receive_quantity' => $request->receive_quantity,
                    'weight_quantity'=>$request->weight_quantity,
                    'inventory_receive' => ($purchaseProducts['inventory_receive']+($request->receive_quantity - $request->weight_quantity)),
                    'remain_quantity'=>$request->remain_quantity,
                    'sack_purchase'=> $request->sack_purchase,
                    'moisture'=> $request->moisture,
                    'deduction_quantity' =>$request->deduction_quantity,
                    'bill_quantity'=> $request->bill_quantity,
                    'purchase_rate' => $request->purchase_rate,
                    'transport_vehicle'=> $request->transport_vehicle,
                   'transport_fare'=> $request->transport_fare,
                   'total_payable_amount'=> $request->total_payable_amount
            ]);
           if($savePurchase){
                Session::flash('success','Purchase Save Successfully !!');
            }else {
                Session::flash('error','Something Went Wrong!!');
            } 
    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
    }               
      
        return redirect()->route('/purchase');
    }

    public function supplierWiseWirehouse($supplierId)
    {
         return Wirehouse::where('raw_supplier_id',$supplierId)->get();
         
    }

    public function wirehouseWiseProducts($wirehouseId)
    {
         return Product::where('wirehouse_id',$wirehouseId)->get();
         
    }
    public function editwirehouseWiseProducts($wirehouseId)
        {
             return Product::where('wirehouse_id',$wirehouseId)->get();
             
        }

     public function productWiseRemain($productId)
    {
        
        $results =  Purchase::join('products','products.product_id','=','purchases.product_id')
                         
                         ->where('products.product_id',$productId)
                         ->get();

         foreach ($results as $key => $result) {
            $remain = $result->remain_quantity;
         }

         echo $remain;
    }
    public function editProductWiseRemain($productId)
    {
        
        $results =  Purchase::join('products','products.product_id','=','purchases.product_id')
                         
                         ->where('products.product_id',$productId)
                         ->get();

         foreach ($results as $key => $result) {
            $remain = $result->remain_quantity;
         }

         echo $remain;
    }
    













    public function editPurchase($purchaseId)
    {
        // echo $purchaseId;
        // exit();
        $purchase = Purchase::where('purchase_id',$purchaseId)->first();
        // echo "<pre>";
        // print_r($purchase);
        // exit();

        $products = Product::get([
            'products.*'
        ]);

        $suppliers = RawSupplier::get([
            'raw_suppliers.*'
        ]);

        $wirehouses = Wirehouse::get([
            'wirehouses.*'
        ]); 

        
        
        return view('Backend.purchase.purchase-edit',compact('purchase','products','suppliers','wirehouses'));
    }


    public function updatePurchase(Request $request,$purchaseId)
    {
        //return $request->all();

        try{
            $updatePurchase = Purchase::where('purchase_id',$purchaseId)
            ->update([
                'raw_supplier_id' => $request->raw_supplier_id,
                'product_id' => $request->product_id,
                'wirehouse_id' => $request->wirehouse_id,
                'date' => $request->date,
                'order_quantity' => $request->order_quantity,
                'receive_quantity' => $request->receive_quantity,
                'weight_quantity' => $request->weight_quantity,
                'inventory_receive' => $request->receive_quantity - $request->weight_quantity,
                'remain_quantity' => $request->remain_quantity,
                'sack_purchase' => $request->sack_purchase,
                'moisture' => $request->moisture,
                'deduction_quantity' => $request->deduction_quantity,
                'supplier_chalan_qty' => $request->supplier_chalan_qty,
                'bill_quantity' => $request->bill_quantity,
                'purchase_rate' => $request->purchase_rate,
                'transport_vehicle' => $request->transport_vehicle,
                'transport_fare' => $request->transport_fare,
                'total_payable_amount' => $request->total_payable_amount,
                

                ]);
           if($updatePurchase){
                Session::flash('success','Purchase Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('/purchase');
       
    }

    public function deletePurchase($purchaseId)
    {
        try{
             $purchase = Purchase::where('purchase_id',$purchaseId)
                ->delete();
            if($purchase){
                Session::flash('success','Purchase Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/purchase');
       
    }
}

