<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class RegisterController extends Controller
{
    public function index(Request $request)
    {
    	 if($request->isMethod('post'))
    	 {
    	 	//registration codes does here
	    	 if($request->has('step1'))
	    	 {
	    	 	$this->validate($request, [
	                 'staff_id'      =>  'required',
	            	]);
	    	 	$user = User::where('staff_id',$request->input('staff_id'))->first();
	    	 	if($user)
	    	 	{
	    	 		return  redirect()->route('register',['staff_id'=>$user->staff_id]);
	    	 	}
	    	 	else
	    	 	{
	    	 		return view('register')->withErrors(['Sorry We Don\'t know You']);
	    	 	}
	    	 }
	    	 if($request->has('step2'))
	    	 {
		    	 	$this->validate($request, [
	                 'email'         =>  'email|required',
	                 'work_email'    =>  'email|required',
	                 'staff_id'      =>  'required',
	            	]);
	            	$user = User::where('staff_id',$request->input('staff_id'))->first();
	            	$user->email = $request->input('email');
	            	$user->work_email = $request->input('work_email');
	            	$user->save();
	            	return redirect()->back()->with(['info'=>'Go to your email for netx step']);
	    	 }
    	 }
    	 else
    	 {
    	 	return view('register');
    	 }
    }
}
