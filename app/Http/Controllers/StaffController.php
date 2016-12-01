<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Course;
use Cart;
class StaffController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth',['except'=>['login','logout']]);
    }
    public function index()
    {
    	return view('register');
    }
    public function login(Request  $request)
    {
    	if($request->isMethod('POST'))
    	{
    		$this->validate($request, [
	                 'staff_id'      =>  'required',
	                 'password'      =>  'required',
	            	]);
    		$staff_id=$request->input('staff_id');
       		$password=$request->input('password');
	       if (Auth::attempt(['staff_id' => $staff_id, 'password' => $password])) {
	            // Authentication passed...
	            return redirect()->route('dashboard.index');
	        }
	        else
	        {
	        	return redirect()->back();
	        }
    	}
    	else
    	{
    		return view('login');
    	}
    }
    public function forget(Request $request)
    {
    	if($request->isMethod('POST'))
    	{

    	}
    }
    public function home(Request $request)
    {
        $courses = Course::all();
        return view('staff.home')->with(['courses'=>$courses]);
    }
}
