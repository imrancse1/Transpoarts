<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Category;


class VehicleCatagoryController extends Controller
{
    public function index(){
    	$categories=Category::all();
    	return view('Backend.category.categoryIndex',compact('categories'));
    }

    public function create(){
      
    	return view('Backend.category.create');
    } 

    // public function edit($category_id){
    //     $categories=Category::find($category_id);
    //     return view('Backend.category.create',compact('categories'));
    // }

    public function store(Request $request){

    	

    	 $request->validate([
           'category_name' => 'required|string' 
        ]);
  
        Category::create($request->all());
   
        return redirect()->route('/categoty')
                        ->with('success','Category created successfully.');
    }

    public function categoryEdit($categoryId)
    {
        //echo $categoryId;
        $category = Category::where('category_id',$categoryId)->first();
         return view('Backend.category.category-edit',compact('category'));
    }

    public function categoryUpdate(Request $request,$categoryId)
    {
        //return $request->all();
        try{
            $updateCategory = Category::where('category_id',$categoryId)
            ->update([
                'category_name' => $request->category_name
                ]);
           if($updateCategory){
                Session::flash('success','Category Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('/categoty');
       
    }



    public function categoryDestroy($categoryId)
    {
        try{
             $category = Category::where('category_id',$categoryId)
                ->delete();
            if($category){
                Session::flash('success','Category Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/categoty');
       
    }
}
