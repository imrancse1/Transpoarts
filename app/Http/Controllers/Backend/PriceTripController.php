<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\PriceTrip;
use App\TripInfo;

class PriceTripController extends Controller
{
    public function index(){
    	$priceTrips = PriceTrip::join('trip_infos','trip_infos.trip_info_id','=','price_trips.priceTrips_id')
                ->get();
    	return view('Backend.priceTrip.priceTrip-index',compact('priceTrips'));
    }

     public function create(){
     	$tripInfos = TripInfo::all();

    	return view('Backend.priceTrip.priceTrip-create',compact('tripInfos'));
    }

    public function store(Request $request){
		
		$this->validate($request,[
		   'trip_info_id' => 'required' ,
           'amount' => 'required' 
           
		]);

		$data = new PriceTrip();
		$data->trip_info_id = $request->trip_info_id;
		$data->amount = $request->amount;
		$data->save();

		 return redirect()->route('/priceTrip')
                        ->with('success','price Trip created successfully.');

  
    }

    public function priceTripEdit($priceTripId)
    {
        //echo $tripId;
        $priceTrip = PriceTrip::where('priceTrips_id',$priceTripId)->first();
        // $vehicles = InputVehicle::pluck('vehicle_name','input_vehicle_id')->all();
        $trip = TripInfo::get([
            'trip_infos.*'
        ]);
        // echo "<pre>";
        // print_r($vehicles);
        // exit();
        return view('Backend.priceTrip.priceTrip-edit',compact('priceTrip','trip'));
    }


    public function priceTripUpdate(Request $request,$priceTripId)
    {
        // return $request->all();
        // exit();
        try{
            $updatePrice = PriceTrip::where('priceTrips_id',$priceTripId)
            ->update([
                
                // 'trip_info_id' => $request->trip_info_id,
                'amount' => $request->amount,
                
                ]);
           if($updatePrice){
                Session::flash('success','Trip Price Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('/priceTrip');
       
    }



    public function priceTripDelete($priceTripId)
    {
        try{
             $price = PriceTrip::where('priceTrips_id',$priceTripId)
                ->delete();
            if($price){
                Session::flash('success','Trip Price Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/priceTrip');
       
    }
}
