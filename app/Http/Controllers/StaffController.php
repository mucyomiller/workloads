<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Notifications\UserRegistered;
use Auth;
use Hash;
use Validator;
use App\User;
use Cart;
class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['login','forget','register','logout','setpassword']]);
    }
    public function index()
    {
    	return view('register');
    }
    public function profile(Request $request)
    {
        $user = $request->user();
        return view('staff.profile')->with(['user'=>$user]);
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
            $activated = User::where('staff_id',$staff_id)->first()->registered;
            if(!$activated)
            {
                if($password != User::where('staff_id',$staff_id)->first()->password)
                {
                 return redirect()->route('login')->withErrors(['password'=>'Unrecognised generated password'])->withInput();   
                }
                return redirect()->route('login',['generated'=>$password,'staff_id'=>$staff_id]);
            }
            else
            {
                if (Auth::attempt(['staff_id' => $staff_id, 'password' => $password])) {
                // Authentication passed...
                return redirect()->route('dashboard.index');
            }
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
                    return redirect()->route('login')
                    ->with(['info'=>'check one of your provided email for next step']);
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
            return response()
            ->json(['info'=>'return back soon!']);
    	}
        else
        {
            return view('forget');
        }
    }
    public function home(Request $request)
    {
        $courses = [];
        return view('staff.home')->with(['courses'=>$courses]);
    }
    public function setpassword(Request $request)
    {
        $this->validate($request, [
                     'password'      =>  'required|confirmed',
                     'staff_id'      => 'required',
                    ]);
        $user = User::where('staff_id',$request->staff_id)->first();
        if($user->registered == 0)
        {
            $user->password = Hash::make($request->password);
            $user->registered = 1;
            $user->save();
            return redirect()->route('login')->with(['info'=>'password successful set you can now login!']);
        }
        else
        {
            return redirect()->route('login')->with(['info'=>'You are already registred you can now login& forget password!']);
        }
    }
}
