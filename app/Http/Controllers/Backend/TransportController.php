<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transport;
use Session;

class TransportController extends Controller
{
    public function index(){
    	$transports = Transport::all();
    	return view('Backend.transport.transport-index',compact('transports'));
    }

    public function createTransport(){
    	return view('Backend.transport.transport-create');
    }

    public function storeTransport(Request $request){

    	$this->validate($request,[
    		'vehicle_name' => 'required',
    		'up_trip' => 'required',
    		'down_trip' => 'required'

    	]);

    	$data = new Transport();
    	$data->vehicle_name = $request->vehicle_name;
    	$data->up_trip = $request->up_trip;
    	$data->down_trip = $request->down_trip;
    	$data->save();

    	 return redirect()->route('/transport')
                        ->with('success','Transport created successfully.');
    }

    public function editTransport($transportId){
    	 // echo $transportId;
         $transport = Transport::where('transport_id',$transportId)->first();
         return view('Backend.transport.transport-edit',compact('transport'));
    }



	public function updateTransport(Request $request,$transportId)
	    {
	        //return $request->all();
	        try{
	            $updateTransport = Transport::where('transport_id',$transportId)
	            ->update([
	                'vehicle_name' => $request->vehicle_name,
	                'up_trip' => $request->up_trip,
	                'down_trip' => $request->down_trip
	                ]);
	           if($updateTransport){
	                Session::flash('success','Transport Updated successfully!!!');
	           }else {
	                Session::flash('error','Something Went Wrong!!!');
	           } 
	        }catch(\Exception $e){
	            //return $e;
	            Session::flash('error',$e->errorInfo[2]);
	        }
	        return redirect()->route('/transport');
	       
	    }

    public function deleteTransport($transportId)
    {
        try{
             $transport = Transport::where('transport_id',$transportId)
                ->delete();
            if($transport){
                Session::flash('success','Transport Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/transport');
       
    }
}
