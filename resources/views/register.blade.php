@extends('frontend.theme')
@section('content')
<div class="wrapper-page animated fadeInDown">
<div class="panel">
<div class="panel-heading">
<img class="img img-responsive" src="{{asset('img/ur-logo1.jpg')}}">
<h3 class="text-center m-t-10"> Create a new Account </h3>
</div> 

<form method="POST" action="{{route('register')}}" class="form-horizontal m-t-40">
@if(isset($_GET['staff_id']))
<div class="form-group">
    <div class="col-xs-12">
        <input class="form-control" type="text" name="email" placeholder="Enter Your Email" required/>
    </div>
</div>
<div class="form-group">
    <div class="col-xs-12">
        <input class="form-control" type="text" name="work_email" placeholder="Enter Your Work Email" required/>
        <input type="hidden" name="staff_id" value={{ $_GET['staff_id'] }} />
        <input type="hidden" name="step2" value="step2"/>
    </div>
</div>
@else
<div class="form-group">
    <div class="col-xs-12">
        <input class="form-control" type="text" name="staff_id" placeholder="Enter Your Staff ID" required/>
        <input type="hidden" name="step1" value="step1"/>
    </div>
</div>
<div class="form-group ">
    <div class="col-xs-12">
        <label class="cr-styled">
            <input type="checkbox" checked>
            <i class="fa"></i> 
             I accept <strong><a href="#">Terms and Conditions</a></strong>
        </label>
    </div>
</div>
@endif
<div class="form-group text-right">
    <div class="col-xs-12">
    {{ csrf_field() }} 
        <button class="btn btn-info w-md" type="submit">@if(isset($_GET['staff_id'])) register @else Next @endif</button>
    </div>
</div>

<div class="form-group m-t-30">
    <div class="col-sm-12 text-center">
        <a href="{{route('login')}}">Already have account?</a>
    </div>
</div>
</form>                                  

</div>
</div>
@endsection()