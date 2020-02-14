<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\PriceTrip;
use App\TripCashReceive;
use App\InputVehicle;
use App\TripInfo;

class TripCashReceiveController extends Controller
{
     public function index(){
    	$trip_infos = TripCashReceive::join('trip_infos','trip_infos.trip_info_id','=','trip_cash_receives.trip_cash_receives_id')
                ->get();

        // $input_vehicles = TripCashReceive::join('input_vehicles','input_vehicles.input_vehicle_id','=','trip_cash_receives.trip_cash_receives_id')
        //         ->get();
    	return view('Backend.tripCashReceive.tripCashReceive-index',compact('trip_infos'));
    }

     public function create(){
     	$tripInfos = TripInfo::all();
     	//$inputVehicle = InputVehicle::all();

    	return view('Backend.tripCashReceive.tripCashReceive-create',compact('tripInfos'));
    }

    public function store(Request $request){
		
		$this->validate($request,[
		   'trip_info_id' => 'required' ,
           'amount' => 'required' 
           
		]);

		$data = new TripCashReceive();
		$data->trip_info_id = $request->trip_info_id;
		
		$data->amount = $request->amount;
		$data->save();

		 return redirect()->route('/tripCashReceive')
                        ->with('success','trip Cash Receive created successfully.');

    }

    public function tripCashReceiveEdit($tripCashReceiveId)
    {
        //echo $tripId;
        $tripCashReceive = TripCashReceive::where('trip_cash_receives_id',$tripCashReceiveId)->first();
        $trip = TripInfo::get([
            'trip_infos.*'
        ]);
        // echo "<pre>";
        // print_r($tripCashReceive);
        // exit();
        return view('Backend.tripCashReceive.tripCashReceive-edit',compact('tripCashReceive','trip'));
    }


    public function tripCashReceiveUpdate(Request $request,$tripCashReceiveId)
    {
        // return $request->all();
        // exit();
        try{
            $updateCashReceive = TripCashReceive::where('trip_cash_receives_id',$tripCashReceiveId)
            ->update([
                
                // 'trip_info_id' => $request->trip_info_id,
                'amount' => $request->amount,
                
                ]);
           if($updateCashReceive){
                Session::flash('success','Trip Cash Receive Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('/tripCashReceive');
       
    }



    public function tripCashReceiveDelete($tripCashReceiveId)
    {
        try{
             $tripCashReceive = TripCashReceive::where('trip_cash_receives_id',$tripCashReceiveId)
                ->delete();
            if($tripCashReceive){
                Session::flash('success','Trip Cash Receive Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/tripCashReceive');
       
    }
}
