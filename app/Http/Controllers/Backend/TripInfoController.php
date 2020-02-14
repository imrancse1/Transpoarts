<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\InputVehicle;
use App\TripInfo;

class TripInfoController extends Controller
{
     public function index(){
     	$tripInfos = TripInfo::join('input_vehicles','input_vehicles.input_vehicle_id','=','trip_infos.input_vehicle_id')
                ->get();
    	return view('Backend.tripInfo.tripInfo-index',compact('tripInfos'));
    }

     public function create(){
     	$inputVehicle = InputVehicle::all();
    	return view('Backend.tripInfo.create',compact('inputVehicle'));
    }

    public function store(Request $request){
		
		$this->validate($request,[
		   'input_vehicle_id' => 'required' ,
           'number_of_trip' => 'required' ,
           'up_trip' => 'required' ,
           'down_trip' => 'required' 
		]);

		$data = new TripInfo();
		$data->input_vehicle_id = $request->input_vehicle_id;
		$data->number_of_trip = $request->number_of_trip;
		$data->up_trip = $request->up_trip;
		$data->down_trip = $request->down_trip;
		$data->save();

		 return redirect()->route('/tripInfo')
                        ->with('success','trip Info created successfully.');

  
    }

    public function tripEdit($tripId)
    {
        //echo $tripId;
        $trip = TripInfo::where('trip_info_id',$tripId)->first();
        // $vehicles = InputVehicle::pluck('vehicle_name','input_vehicle_id')->all();
        $vehicles = InputVehicle::get([
            'input_vehicles.*'
        ]);
        // echo "<pre>";
        // print_r($vehicles);
        // exit();
        return view('Backend.tripInfo.tripInfo-edit',compact('trip','vehicles'));
    }


    public function tripUpdate(Request $request,$tripId)
    {
        //return $request->all();
        try{
            $updateTrip = TripInfo::where('trip_info_id',$tripId)
            ->update([
                'input_vehicle_id' => $request->input_vehicle_id,
                'number_of_trip' => $request->number_of_trip,
                'up_trip' => $request->up_trip,
                'down_trip' => $request->down_trip,
                ]);
           if($updateTrip){
                Session::flash('success','Trip Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('/tripInfo');
       
    }



    public function tripDelete($tripId)
    {
        try{
             $trip = TripInfo::where('trip_info_id',$tripId)
                ->delete();
            if($trip){
                Session::flash('success','Trip Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/tripInfo');
       
    }
}
