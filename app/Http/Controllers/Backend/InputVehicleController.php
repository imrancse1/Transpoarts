<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\InputVehicle;
use App\Category;
use DB;
class InputVehicleController extends Controller
{
     public function index(){
    	$vehicles = InputVehicle::join('categories','categories.category_id','=','input_vehicles.category_id')
                ->get();
    	return view('Backend.inputVehicles.input-vehicles-index',compact('vehicles'));
    }

     public function create(){
     	$categotys = Category::all();
    	return view('Backend.inputVehicles.create',compact('categotys'));
    }

    public function store(Request $request){
		
		$this->validate($request,[
		   'category_id' => 'required' ,
           'vehicle_name' => 'required' ,
           'vehicle_license_number' => 'required' 
		]);

		$data = new InputVehicle();
		$data->category_id = $request->category_id;
		$data->vehicle_name = $request->vehicle_name;
		$data->vehicle_license_number = $request->vehicle_license_number;
		$data->save();

		 return redirect()->route('/inputVehicle')
                        ->with('success','input Vehicle created successfully.');

  
    }

     public function vehicleEdit($vehicleId)
    {
        //echo $tripId;
        $vehicles = InputVehicle::where('input_vehicle_id',$vehicleId)->first();
        
        $category = Category::get([
            'categories.*'
        ]);
        // echo "<pre>";
        // print_r($vehicles);
        // exit();
        return view('Backend.inputVehicles.inputVehicles-edit',compact('vehicles','category'));
    }

     public function vehicleUpdate(Request $request,$vehicleId)
    {
        //return $request->all();
        try{
            $updateVehicle = InputVehicle::where('input_vehicle_id',$vehicleId)
            ->update([
                'category_id' => $request->category_id,
                'vehicle_name' => $request->vehicle_name,
                'vehicle_license_number' => $request->vehicle_license_number,
                ]);
           if($updateVehicle){
                Session::flash('success','Vehicle Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('/inputVehicle');
       
    }



    public function vehicleDelete($vehicleId)
    {
        try{
             $vehicle = InputVehicle::where('input_vehicle_id',$vehicleId)
                ->delete();
            if($vehicle){
                Session::flash('success','Vehicle Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/inputVehicle');
       
    }
}
