<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Purchase;
use App\Wirehouse;
use App\Inventory;
use App\WorkOrder;
use Session;
use DB;

class InventoryController extends Controller
{
    public function index(){

        $inventory = Purchase::join('raw_suppliers','raw_suppliers.raw_supplier_id','=','purchases.raw_supplier_id')
        ->join('products','products.product_id','=','purchases.product_id')
        ->join('wirehouses','wirehouses.wirehouse_id','=','purchases.wirehouse_id')
        ->orderBy('purchases.purchase_id', 'asc')
        ->get();


        // $purchases = Purchase::get();
        // $wirehouse = [];
        // foreach ($purchases as $key => $purchase) {
        //    $wirehouse[] = $purchase->wirehouse_id; 
        // }

        // foreach ($wirehouse as $key => $value) {
        //     $wirehouseValue[] = Purchase::where('wirehouse_id',$value)
        //     ->sum('purchases.inventory_receive');
        // }
        // $wireHouseWiseAmount = array_unique($wirehouseValue);
        // // echo "<pre>";
        // // print_r($wireHouseWiseAmount);
        // // exit();
        // $pId = Product:: get();

        // $pId = DB::select('SELECT purchases.wirehouse_id FROM `purchases`');

         //dd($pId);
        // echo "<pre>";
        // print_r($pId);
        // exit();

      //  $all = array($pId);
        //dd($all);
         // @foreach($wireHouseWiseAmount as $key=>$wireHoueStock)
         //      <tr>
         //        <td>{{$wireHoueStock}}</td>
         //      </tr>
         //      @endforeach


                       

            
       //  foreach ($pId as $key=> $id) {
       //       //dd($id);
       // $purchases = DB::table('purchases')
       //   ->join('products','products.product_id','=','purchases.product_id')
       //     ->where('products.product_id', '=',  $id->product_id)
       //    ->sum('purchases.inventory_receive');
       //  //       //   dd($purchases);
       //      // $purchases=DB::select('SELECT SUM(purchases.inventory_receive) as stock_rcv FROM `purchases`
       //      //     where purchases.wirehouse_id ="'. ($id[$key])->wirehouse_id.'"');
              

       //  //         // echo "$key";
       //  //         // exit();
       //      $key++;
       //  }

        //dd($purchases);




        
        // echo "<pre>";
        // print_r($purchases);
        //  exit();
        
    	$total_stock = Purchase::sum('inventory_receive');
        return view('Backend.inventory.inventory',compact('inventory','total_stock'));
        
          
    }

    public function showStock(){

        $inventory = Purchase::join('raw_suppliers','raw_suppliers.raw_supplier_id','=','purchases.raw_supplier_id')
        ->join('products','products.product_id','=','purchases.product_id')
        ->join('wirehouses','wirehouses.wirehouse_id','=','purchases.wirehouse_id')
        ->get();


        $purchases =  Purchase::get();
        $wirehouse = [];
        foreach ($purchases as $key => $purchase) {
           $wirehouse[] = $purchase->wirehouse_id; 
           //$wirehouseName[] = $purchase->wirehouse_name; 
        }
        // echo "<pre>";
        // print_r($wirehouseName);
        // exit();

        foreach ($wirehouse as $key => $value) {
            $wirehouseValue[] = Purchase::where('wirehouse_id',$value)

            ->sum('purchases.inventory_receive');
        }
        $wireHouseWiseAmount = array_unique($wirehouseValue);

       
      
        
        $total_stock = Purchase::sum('inventory_receive');
        return view('Backend.inventory.showStock',compact('inventory','purchases','total_stock','wireHouseWiseAmount'));
        
          
    }







    public function createInventory(){
       
        $products = Product::all();
        $wirehouses = Wirehouse::all();
       // $purchases = Purchase::join('products','products.product_id','=','purchases.product_id')
       // ->get();

       
        return view('Backend.inventory.inventoryCreate',compact('products','wirehouses'));
    }

    // public function storeInventory(Request $request){

      
    // 	$this->validate($request,[
    // 		'wirehouse_id' => 'required',
    //         'product_id' => 'required',
    //         'stock_in' => 'required',
    //         'recevie' => 'required',
    //         'deduction' => 'required',
    //         'total_amount' => 'required'

    // 	]);

    // 	$data = new Inventory();
    // 	$data->wirehouse_id = $request->wirehouse_id;
    //     $data->product_id = $request->product_id;
    //     $data->stock_in = $request->stock_in;
    //     $data->recevie = $request->recevie;
    //     $data->deduction = $request->deduction;
    //     $data->total_amount = $request->total_amount;
    // 	$data->save();
    
    

    // 	 return redirect()->route('/inventory')
    //                     ->with('success','Inventory created successfully.');
    // }
    
     public function storeInventory(Request $request)
    {
        $this->validate($request,[
    		'wirehouse_id' => 'required',
            'product_id' => 'required',
            'stock_in' => 'required',
            'recevie' => 'required',
    	]);
       
        DB::beginTransaction();
        try{
            $saveInventory = Inventory::insertGetId([
                'wirehouse_id' => $request->wirehouse_id,
                'product_id' => $request->product_id,
                'stock_in' => $request->stock_in,
                'recevie' => $request->recevie,
                //'created_at' => Carbon::now(),
            ]);

            if($saveInventory){
                DB::commit();
                Session::flash('success','Inventory Create Successfully !!');
            }else {
                DB::rollback();
               Session::flash('error','Something Went Wrong!!');
            }
        }catch(\Exception $e){
            //return $e;
            DB::rollback();
            Session::flash('warning',$e->errorInfo[2]);
        } 
        return redirect()->route('/inventory');
    }
    

   public function editInventory($inventoryId)
    {
        // echo $purchaseId;
        // exit();
        $inventory = Inventory::where('inventory_id',$inventoryId)->first();
        // echo "<pre>";
        // print_r($inventory);
        // exit();

        $products = Product::get([
            'products.*'
        ]);

        $wirehouses = Wirehouse::get([
            'wirehouses.*'
        ]); 

        
        
        return view('Backend.inventory.inventoryEdit',compact('inventory','products','wirehouses'));
    }

    public function wirehouseWiseProduct($wirehouseId)
    {
         return Product::where('wirehouse_id',$wirehouseId)->get();
         
    }
    
    // public function productWiseWirehouse($productId)
    // {
    //      return Purchase::join('wirehouses','wirehouses.wirehouse_id','=','purchases.wirehouse_id')
    //      ->join('products','products.product_id','=','purchases.product_id')
                           
    //                      ->where('wirehouses.wirehouse_id',$productId)
    //                      ->get();
         
    // }

     public function productWiseStock($productId)
        {
             return Purchase::join('products','products.product_id','=','purchases.product_id')
                             ->where('products.product_id',$productId)
                             ->get();
             
        }
    public function productWiseDeduction($productId)
            {
                 return Purchase::join('products','products.product_id','=','purchases.product_id')
                                   
                                 ->where('products.product_id',$productId)
                                 ->get();
                 
            } 

    public function productWiseAmountId($productId)
    {
        return Purchase::join('products','products.product_id','=','purchases.product_id')
                                   
             ->where('products.product_id',$productId)
             ->get();
                 
    }



	public function updateInventory(Request $request,$inventoryId)
	    {
	        //return $request->all();
	        try{
	            $updateInventory = Inventory::where('inventory_id',$inventoryId)
	            ->update([
                    
	                'wirehouse_id' => $request->wirehouse_id,
                    'product_id' => $request->product_id,
                    'recevie' => $request->recevie,
                    'deduction' => $request->deduction,
                    'total_amount' => $request->total_amount,
	                ]);
	           if($updateInventory){
	                Session::flash('success','Inventory Updated successfully!!!');
	           }else {
	                Session::flash('error','Something Went Wrong!!!');
	           } 
	        }catch(\Exception $e){
	            //return $e;
	            Session::flash('error',$e->errorInfo[2]);
	        }
	        return redirect()->route('/inventory');
	       
	    }








    public function deleteInventory($inventoryId)
    {
        try{
             $inventory = Inventory::where('inventory_id',$inventoryId)
                ->delete();
            if($inventory){
                Session::flash('success','Inventory Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/inventory');
       
    }

    
}
