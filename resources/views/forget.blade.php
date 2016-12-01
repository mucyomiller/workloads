@extends('frontend.theme')
@section('content')
<div class="wrapper-page animated fadeInDown">
<div class="panel">
    <div class="panel-heading"> 
    <img class="img img-responsive" src="{{asset('img/ur-logo1.jpg')}}">
    </div> 
    <form method="POST" action="{{ route('forget') }}" role="form" class="text-center"> 
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Instructions to reset password will be sent to both of your <b>E-mails</b>!
        </div>
        <div class="form-group m-b-0"> 
            <div class="input-group"> 
                <input type="password" class="form-control" placeholder="Enter Your Staff ID"> 
                {{ csrf_field() }}
                <span class="input-group-btn"> <button type="submit" name="submit" class="btn btn-primary">Reset</button> </span> 
            </div> 
        </div> 
        
    </form>
</div>
</div>
@endsection()