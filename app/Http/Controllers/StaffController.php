<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Notifications\UserRegistered;
use Auth;
use Validator;
use App\User;
use App\Course;
use Cart;
class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['login','register','logout']]);
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
    public function register(Request $request)
    {
        if($request->isMethod('POST'))
         {
            //registration codes does here
             if($request->has('step1'))
             {
                $message = [
                'exists' =>'Sorry we can\'t recognize your :attribute ', 
                ];
                Validator::make($request->all(), [
                     'staff_id'      =>  'required|exists:users',
                    ],$message)->validate();
                return  redirect()->route('register',['staff_id'=>$request->input('staff_id')]);
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
                    $user->password = str_random(6);
                    $user->save();
                    $user->notify(new UserRegistered($user));
                    return redirect()->back()
                    ->with(['success'=>'check one of your provided email for next step']);
             }
         }
         else
         {
            return view('register');
         }
    }
    public function forget(Request $request)
    {
    	if($request->isMethod('POST'))
    	{

    	}
        else
        {
            return view('forget');
        }
    }
    public function home(Request $request)
    {
        $courses = Course::all();
        return view('staff.home')->with(['courses'=>$courses]);
    }
}
