<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Product;


class ProductController extends Controller
{
    public function index(){
    	$products = Product::all();
    	return view('Backend.product.product-index',compact('products'));
    }

     public function create(){
     	
    	return view('Backend.product.product-create');
    }

     public function store(Request $request){

    	$this->validate($request,[
    		'product_name' => 'required',
    		'weight_unit_tons' => 'required'

    	]);

    	$data = new Product();
    	$data->product_name = $request->product_name;
    	$data->weight_unit_tons = $request->weight_unit_tons;
    	$data->save();

    	 return redirect()->route('/product')
                        ->with('success','Product created successfully.');
    }


     public function productEdit($productId)
    {
       // echo $productId;
         $product = Product::where('product_id',$productId)->first();
         return view('Backend.product.product-edit',compact('product'));
    }

    public function productUpdate(Request $request,$productId)
    {
        //return $request->all();
        try{
            $updateProduct = Product::where('product_id',$productId)
            ->update([
                'product_name' => $request->product_name,
                'weight_unit_tons' => $request->weight_unit_tons
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



    public function productDelete($productId)
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
