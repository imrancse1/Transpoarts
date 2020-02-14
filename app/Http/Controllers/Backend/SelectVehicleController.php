<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\SelectVehicle;
use App\InputVehicle;

class SelectVehicleController extends Controller
{
    public function index(){
    	$vehicles = SelectVehicle::join('input_vehicles','input_vehicles.input_vehicle_id','=','select_vehicles.input_vehicle_id')
                ->get();
    	return view('Backend.selectVehicle.selectVehicle-index',compact('vehicles'));
    }

     public function create(){
     	$inputVehicle = InputVehicle::all();
    	return view('Backend.selectVehicle.selectVehicle-create',compact('inputVehicle'));
    }

    public function store(Request $request){
		
		$this->validate($request,[
		   'input_vehicle_id' => 'required' 
   
		]);

		$data = new SelectVehicle();
		$data->input_vehicle_id = $request->input_vehicle_id;
		$data->save();

		 return redirect()->route('/selectVehicle')
                        ->with('success','Vehicle created successfully.');
    }

     public function selectvehiclesEdit($selectvehiclesId)
    {
        // echo $selectvehiclesId;
        // exit();
        $selectVehicle = SelectVehicle::where('selectvehicles_id',$selectvehiclesId)->first();
        // $vehicles = InputVehicle::pluck('vehicle_name','input_vehicle_id')->all();
        $vehicles = InputVehicle::get([
            'input_vehicles.*'
        ]);
        // echo "<pre>";
        // print_r($selectVehicle);
        // exit();
        return view('Backend.selectVehicle.selectVehicle-edit',compact('selectVehicle','vehicles'));
    }


    public function selectvehicleUpdate(Request $request,$selectvehiclesId)
    {
        //return $request->all();
        try{
            $updateVehicles = SelectVehicle::where('selectvehicles_id',$selectvehiclesId)
            ->update([
                'input_vehicle_id' => $request->input_vehicle_id,
              
                ]);
           if($updateVehicles){
                Session::flash('success','Vehicle Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('/selectVehicle');
       
    }



    public function selectvehicleDelete($selectvehiclesId)
    {
        try{
             $selectVehicle = SelectVehicle::where('selectvehicles_id',$selectvehiclesId)
                ->delete();
            if($selectVehicle){
                Session::flash('success','Select Vehicle Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/selectVehicle');
       
    }

}
