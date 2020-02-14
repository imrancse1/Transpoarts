<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\InputVehicle;
use App\Drive;


class DriveController extends Controller
{
    public function index(){


    	$drives = Drive::join('input_vehicles','input_vehicles.input_vehicle_id','=','drives.input_vehicle_id')
                ->get();
    	return view('Backend.drives.drives-index',compact('drives'));
    }

     public function create(){
     	$inputVehicles = InputVehicle::all();

    	return view('Backend.drives.drives-create',compact('inputVehicles'));
    }

    public function store(Request $request){
		
		$this->validate($request,[
		   'input_vehicle_id' => 'required' ,
           'driver_name' => 'required' 
           
		]);

		$data = new Drive();
		$data->input_vehicle_id = $request->input_vehicle_id;
		$data->driver_name = $request->driver_name;
		$data->save();

		 return redirect()->route('/drives')
                        ->with('success','Drive created successfully.');

  
    }

    public function driveEdit($driveId)
    {
        //echo $tripId;
        $drives = Drive::where('drive_id',$driveId)->first();
        // $vehicles = InputVehicle::pluck('vehicle_name','input_vehicle_id')->all();
        $vehicles = InputVehicle::get([
            'input_vehicles.*'
        ]);
        // echo "<pre>";
        // print_r($vehicles);
        // exit();
        return view('Backend.drives.drives-edit',compact('drives','vehicles'));
    }


    public function driveUpdate(Request $request,$driveId)
    {
        //return $request->all();
        try{
            $updateDrive = Drive::where('drive_id',$driveId)
            ->update([
                'input_vehicle_id' => $request->input_vehicle_id,
                'driver_name' => $request->driver_name,
                
                ]);
           if($updateDrive){
                Session::flash('success','Drive Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('/drives');
       
    }



    public function driveDelete($driveId)
    {
        try{
             $drives = Drive::where('drive_id',$driveId)
                ->delete();
            if($drives){
                Session::flash('success','Drives Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/drives');
       
    }
}
