<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Wirehouse;
use Session;

class ProductController extends Controller
{
    public function index(){
    	//$product = Product::all();
        $product = Product::join('wirehouses','wirehouses.wirehouse_id','=','products.wirehouse_id')
        ->get();
    	return view('Backend.product.product-index',compact('product'));
    }

    public function createProduct(){
        $wirehouses = Wirehouse::all();
    	return view('Backend.product.product-create',compact('wirehouses'));
    }

    public function storeProduct(Request $request){

    	$this->validate($request,[
    		'product_name' => 'required',
            'wirehouse_id' => 'required'

    	]);

    	$data = new Product();
    	$data->product_name = $request->product_name;
        $data->wirehouse_id = $request->wirehouse_id;
    	$data->save();

    	 return redirect()->route('/product')
                        ->with('success','Product created successfully.');
    }

    public function editProduct($productId){
    	 // echo $productId;
         $products = Product::where('product_id',$productId)->first();

          $wirehouses = Wirehouse::get([
            'wirehouses.*'
        ]); 

         return view('Backend.product.product-edit',compact('products','wirehouses'));
    }



	public function updateProduct(Request $request,$productId)
	    {
	        //return $request->all();
	        try{
	            $updateProduct = Product::where('product_id',$productId)
	            ->update([
	                'product_name' => $request->product_name,
                    'wirehouse_id' => $request->wirehouse_id
	                ]);
	           if($updateProduct){
	                Session::flash('success','Product Updated successfully!!!');
	           }else {
	                Session::flash('error','Something Went Wrong!!!');
	           } 
	        }catch(\Exception $e){
	            //return $e;
	            Session::flash('error',$e->errorInfo[2]);
	        }
	        return redirect()->route('/product');
	       
	    }








    public function deleteProduct($productId)
    {
        try{
             $product = Product::where('product_id',$productId)
                ->delete();
            if($product){
                Session::flash('success','Product Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/product');
       
    }
}
