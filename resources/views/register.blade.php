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
<div class="form-group {{$errors->has('email')?'has-error':''}}">
    <div class="col-xs-12">
        <input class="form-control" type="text" name="email" placeholder="Enter Your Email" />
        @if($errors->has('email'))
        <span class="help-block">{{$errors->first('email')}}</span>
        @endif
    </div>
</div>
<div class="form-group {{$errors->has('work_email')?'has-error':''}}">
    <div class="col-xs-12">
        <input class="form-control" type="text" name="work_email" placeholder="Enter Your Work Email" />
        @if($errors->has('work_email'))
        <span class="help-block">{{$errors->first('work_email')}}</span>
        @endif
    </div>
</div>
<input type="hidden" name="staff_id" value={{ $_GET['staff_id'] }} />
<input type="hidden" name="step2" value="step2"/>
@else
<div class="form-group {{$errors->has('staff_id')?'has-error':''}}">
    <div class="col-xs-12">
        <input class="form-control" type="text" name="staff_id" value="{{ old('staff_id', '')}}"  placeholder="Enter Your Staff ID" />
        @if($errors->has('staff_id'))
        <span class="help-block">{{$errors->first('staff_id')}}</span>
        @endif
    </div>
</div>
<input type="hidden" name="step1" value="step1"/>
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