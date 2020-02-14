<?php


namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Reception;

class ReceptionController extends Controller
{
    public function index(){
    	$receptions = Reception::all();
    	return view('Backend.reception.reception-index',compact('receptions'));
    }
    
    public function create(){
    	return view('Backend.reception.create');
    }

    public function store(Request $request){

    	$this->validate($request,[
    		'reception_name' => 'required|string',
    		'reception_address' => 'required|string'

    	]);

    	$data = new Reception();
    	$data->reception_name = $request->reception_name;
    	$data->reception_address = $request->reception_address;
    	$data->save();

    	 return redirect()->route('/reception')
                        ->with('success','Reception created successfully.');
    }

    public function receptionEdit($receptionId)
    {
       // echo $productId;
         $receptions = Reception::where('reception_id',$receptionId)->first();
         return view('Backend.reception.reception-edit',compact('receptions'));
    }

    public function receptionUpdate(Request $request,$receptionId)
    {
        //return $request->all();
        try{
            $updateReception = Reception::where('reception_id',$receptionId)
            ->update([
                'reception_name' => $request->reception_name,
                'reception_address' => $request->reception_address
                ]);
           if($updateReception){
                Session::flash('success','Reception Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('/reception');
       
    }



    public function receptionDelete($receptionId)
    {
        try{
             $reception = Reception::where('reception_id',$receptionId)
                ->delete();
            if($reception){
                Session::flash('success','Reception Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/reception');
       
    }
}
