@extends('frontend.theme')
@section('content')
<div class="wrapper-page animated fadeInDown">
<div class="panel">
    <div class="panel-heading"> 
    <img class="img img-responsive" src="{{asset('img/ur-logo1.jpg')}}">
    </div> 

    <form method="POST" class="form-horizontal m-t-40" action="{{route('login')}}">
                                
        <div class="form-group {{$errors->has('staff_id')?' has-error':'' }}">
            <div class="col-xs-12">
                <input class="form-control"  name="staff_id" type="text" placeholder="Staff Id" 
                value="{{Request::old('staff_id')?:''}}">
                @if($errors->has('staff_id'))
                <span class="help-block">{{$errors->first('staff_id')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group {{$errors->has('password')?' has-error':'' }}">
            
            <div class="col-xs-12">
                <input class="form-control" name="password" type="password" placeholder="Password">
                @if($errors->has('password'))
                <span class="help-block">{{$errors->first('password')}}</span>
                @endif
            </div>
        </div>

        <div class="form-group ">
            <div class="col-xs-12">
                <label class="cr-styled">
                    <input type="checkbox" checked>
                    <i class="fa"></i> 
                    Remember me
                </label>
            </div>
        </div>
        
        <div class="form-group text-right">
            <div class="col-xs-12">
                {{ csrf_field() }}
                <button class="btn btn-info w-md" name="submit" type="submit" value="Log in">Log In</button>
            </div>
        </div>
        <div class="form-group m-t-30">
            <div class="col-sm-7">
                <a href="{{ route('forget') }}"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
            </div>
            <div class="col-sm-5 text-right">
                <a href="{{route('register')}}">Create an account</a>
            </div>
        </div>
    </form>

</div>
</div>
@endsection()