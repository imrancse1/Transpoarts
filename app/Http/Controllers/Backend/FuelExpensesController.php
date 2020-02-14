<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\FuelExpenses;

class FuelExpensesController extends Controller
{
   public function index(){
    	$fuelExpenses = FuelExpenses::all();
    	return view('Backend.fuelExpenses.fuelExpenses-index',compact('fuelExpenses'));
    }
    
    public function create(){
    	return view('Backend.fuelExpenses.fuelExpenses-ereate');
    }

    public function store(Request $request){

    	$this->validate($request,[
    		'oil_expenses' => 'required|string',
    		'mobil_expenses' => 'required|string',
    		'others_expenses' => 'required|string'

    	]);

    	$data = new FuelExpenses();
    	$data->oil_expenses = $request->oil_expenses;
    	$data->mobil_expenses = $request->mobil_expenses;
    	$data->others_expenses = $request->others_expenses;
    	$data->save();

    	 return redirect()->route('/fuelExpenses')
                        ->with('success','Fuel Expenses created successfully.');
    }

    public function fuelExpenseEdit($fuelExpenseId)
    {
       // echo $productId;
         $fuelExpenses = FuelExpenses::where('fuelExpenses_id',$fuelExpenseId)->first();
         return view('Backend.fuelExpenses.fuelExpenses-edit',compact('fuelExpenses'));
    }

    public function fuelExpenseUpdate(Request $request,$fuelExpenseId)
    {
        //return $request->all();
        try{
            $updateFuel = FuelExpenses::where('fuelExpenses_id',$fuelExpenseId)
            ->update([
                'oil_expenses' => $request->oil_expenses,
                'mobil_expenses' => $request->mobil_expenses,
                'others_expenses' => $request->others_expenses,
                ]);
           if($updateFuel){
                Session::flash('success','FuelExpenses Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('/fuelExpenses');
       
    }



    public function fuelExpenseDelete($fuelExpenseId)
    {
        try{
             $fuelExpenses = FuelExpenses::where('fuelExpenses_id',$fuelExpenseId)
                ->delete();
            if($fuelExpenses){
                Session::flash('success','Fuel Expenses Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/fuelExpenses');
       
    }
}
