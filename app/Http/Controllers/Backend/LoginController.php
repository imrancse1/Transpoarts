<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class LoginController extends Controller
{
	public $view_page_url;
	public function __construct() 
	{
		$this->view_page_url = 'Backend.';
	}

	public function loginCheck(LoginRequest $request)
	{
		//return $request->all();
		$credentials = ['email' => $request->email,'password' => $request->password];
		if(Auth::guard('admin')->attempt($credentials)){
			Session::put('xyz',Auth::guard('admin')->user());
			//return Auth::guard('admin')->user();
			return redirect()->intended('/dashboard');
		}else {
			return redirect('/login');
		}
	}
	
    public function dashboard()
    {
    	return view($this->view_page_url.'index');
    }
    public function Logout()
    {
    	Auth::guard('admin')->logout();
    	Session::forget('xyz');
    	return view($this->view_page_url.'login');
    }


 }   