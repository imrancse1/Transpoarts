<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Backend\Models\Settings\Category;
use App\Backend\Models\Test\PersonalInfo;
use App\Custom\Helper;
use Session;
use DB;
class DashBoardController extends Controller
{
	public $view_page_url;
	public function __construct()
	{
		$this->view_page_url = 'Backend.';
	}
    public function index()
    {
    	return view($this->view_page_url.'login');
    }

    //Test 
    public function Test()
    {
    	return view($this->view_page_url.'test.addRecord');
    }

    public function saveRecord(Request $request)
    {
        // return $request->no_of_child;
        // exit();
        $no_of_child=0;
        $no_of_child = $no_of_child + $request->no_of_child;
        DB::beginTransaction();
        try{
            $saveInfo = PersonalInfo::insertGetId([
                'name' => $request->name,
                'mobile_number' => $request->mobile_number,
                'mobile_number' => $request->mobile_number,
                'father_name' => $request->father_name,
                'f_mobile_number' => $request->f_mobile_number,
                'mother_name' => $request->mother_name,
                'm_mobile_number' => $request->m_mobile_number,
                'edu_qualification' => $request->edu_qualification,
                'religion' => $request->religion,
                'dob' => date('Y-m-d',strtotime($request->dob)),
                'nation_id' => $request->nation_id,
                'marital_status' => $request->marital_status,
                'no_of_child' => $no_of_child,
            ]);

            if($saveInfo){
                Session::flash('success', 'Prsonal Info Created Successfull');
                DB::commit();
            }else {
                Session::flash('error','Something Went Wrong');
                DB::rollback();
            }

        }catch(\Exception $e){
            DB::rollback();
            return $e;
            Session::flash('error',$e->errofInfo[2]);
        }
        return redirect()->route('test.test');
    }

    public function dataTableShow()
    {
        return view('Backend.dataTable');
    }
    
}
