<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Batch;


class BatchController extends Controller
{
    public function index(){
    	$batchs = Batch::all();
    	return view('Backend.batch.batch-index',compact('batchs'));
    }

    public function createBatch(){
    	return view('Backend.batch.batch-create');
    }

    public function storeBatch(Request $request){

    	$this->validate($request,[
    		'batch_name' => 'required',
    		'product_name' => 'required',
    		'gender' => 'required'
    		

    	]);

    	$data = new Batch();
    	$data->batch_name = $request->batch_name;
    	$data->product_name = $request->product_name;
    	$data->gender = $request->gender;
    	$data->total_product_number = $request->total_product_number;
    	$data->male_product_number = $request->male_product_number;
    	$data->female_product_number = $request->female_product_number;
    	$data->save();

    	 return redirect()->route('/batch')
                        ->with('success','Batch created successfully.');
    }

    public function editBatch($batchId){
    	 // echo $batchId;
    	 $batchs = Batch::where('batch_id',$batchId)->first();
         return view('Backend.batch.batch-edit',compact('batchs'));
    }

    public function updateBatch(Request $request,$batchId)
    {
        //return $request->all();
        try{
            $updateBatch = Batch::where('batch_id',$batchId)
            ->update([
                'batch_name' => $request->batch_name,
                'product_name' => $request->product_name,
                'gender' => $request->gender,
                'total_product_number' => $request->total_product_number,
                'male_product_number' => $request->male_product_number,
                'female_product_number' => $request->female_product_number
                ]);
           if($updateBatch){
                Session::flash('success','Batch Updated successfully!!!');
           }else {
                Session::flash('error','Something Went Wrong!!!');
           } 
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
        return redirect()->route('/batch');
       
    }



    public function deleteBatch($batchId)
    {
        try{
             $batchs = Batch::where('batch_id',$batchId)
                ->delete();
            if($batchs){
                Session::flash('success','Batch Delete successfully!!!');
            }else {
                Session::flash('error','Something Went Wrong!!!');
            }    
        }catch(\Exception $e){
            //return $e;
            Session::flash('error',$e->errorInfo[2]);
        }
         return redirect()->route('/batch');
       
    }
}
