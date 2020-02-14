<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\TripCosting;

class TripCostingController extends Controller
{
     public function index(){
    	$tripCosts = TripCosting::all();
    	return view('Backend.tripCosting.tripCosting-index',compact('tripCosts'));
    }
    
    public function create(){
    	return view('Backend.tripCosting.tripCosting-create');
    }

    public function store(Request $request){

    	$this->validate($request,[
    		'drives_expence' => 'required|string',
    		'assistive_salary' => 'required|string',
    		'others_expence' => 'required|string'

    	]);

    	$data = new TripCosting();
    	$data->drives_expence = $request->drives_expence;
    	$data->assistive_salary = $request->assistive_salary;
    	$data->others_expence = $request->others_expence;
    	$data->save();

    	 return redirect()->route('/tripCosting')
                        ->with('success','Trip Costing created successfully.');
    }


    public function tripCostEdit($tripCostId)
    {
       // echo $productId;
         $tripCosting = TripCosting::where('tripcost_id',$tripCostId)->first();
         return view('Backend.tripCosting.tripCosting-edit',compact('tripCosting'));
    }

    public function tripCostUpdate(Request $request,$tripCostId)
    {
        //return $request->all();
        try{
            $updateTripCost = TripCosting::where('tripcost_id',$tripCostId)
            ->update([
                'drives_expence' => $request->drives_expence,
                'assistive_salary' => $request->assistive_salary,
                'others_expence' => $request->others_expence,
                ]);
           if($updateTripCost){
                Session::flash('success','Trip Costing Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('/tripCosting');
       
    }



    public function tripCostDelete($tripCostId)
    {
        try{
             $tripCosting = TripCosting::where('tripcost_id',$tripCostId)
                ->delete();
            if($tripCosting){
                Session::flash('success','Trip Costing Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/tripCosting');
       
    }
}
