@extends('dashboard.theme')
@section('content')
<!-- Page Content Start -->
<!-- ================== -->
<div class="wraper container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="bg-picture" style="background-image:url('img/bg_6.jpg')">
<span class="bg-picture-overlay"></span><!-- overlay -->
<!-- meta -->
<div class="box-layout meta bottom">
<div class="col-sm-6 clearfix">
<span class="img-wrapper pull-left m-r-15"><img src="{{ asset('dashboard/img/User_Avatar.png')}}" alt="" style="width:64px" class="br-radius"></span>
<div class="media-body">
<h3 class="text-white mb-2 m-t-10 ellipsis">{{ $user->surname }} &nbsp; {{$user->firstname}}</h3>
<h5 class="text-white">rank title</h5>
</div>
</div>
<div class="col-sm-6">

<div class="pull-right">
<div class="dropdown">
<a data-toggle="dropdown" class="dropdown-toggle btn btn-primary" href="profile.html#"> Setting <span class="caret"></span></a>
<ul class="dropdown-menu dropdown-menu-right" role="menu">
<li><a href="#">edit</a></li>
<li class="divider"></li>
<li><a href="profile.html#">null</a></li>
</ul>
</div>
</div>
</div>
</div>
<!--/ meta -->
</div>
</div>
</div>

<div class="row m-t-30">
<div class="col-sm-12">
<div class="panel panel-default p-0">
<div class="panel-body p-0"> 
<ul class="nav nav-tabs profile-tabs">
<li class="active"><a data-toggle="tab" href="profile.html#aboutme">Profile info</a></li>
<li class=""><a data-toggle="tab" href="profile.html#edit-profile">Settings</a></li>
</ul>

<div class="tab-content m-0"> 

<div id="aboutme" class="tab-pane active">
<div class="profile-desk">
<h1>{{ $user->surname}} &nbsp;{{$user->firstname }}</h1>
<span class="designation">title goes here</span>
<p>
some description goes here.
</p>
<a class="btn btn-primary m-t-20" href="#"> <i class="fa fa-check"></i> Edit</a>

<table class="table table-condensed">
<thead>
<tr>
<th colspan="3"><h3>Contact Information</h3></th>
</tr>
</thead>
<tbody>
<tr>
<td><b>Work Email</b></td>
<td>
<a href="profile.html#" class="ng-binding">
{{ $user->work_email}}
</a></td>
</tr>
<tr>
<td><b>Email</b></td>
<td>
<a href="profile.html" class="ng-binding">
{{ $user->email}}
</a></td>
</tr>
<tr>
<td><b>Phone</b></td>
<td class="ng-binding">null</td>
</tr>
<tr>
<td><b>ID Number</b></td>
<td>
<a href="#" class="ng-binding">
{{$user->idcardnumber?$user->idcardnumber:'Not Available'}}
</a></td>
</tr>
<tr>
<td><b>Passport</b></td>
<td>
<a href="#" class="ng-binding">
{{$user->passportnumber?$user->passportnumber:'Not Available'}}
</a></td>
</tr>
</tbody>
</table>
</div> <!-- end profile-desk -->
</div> <!-- about-me -->

<!-- settings -->
<div id="edit-profile" class="tab-pane">
<div class="user-profile-content">
<form role="form">
<div class="form-group">
<label for="FullName">Surname</label>
<input type="text" value="John Doe" id="FullName" class="form-control">
</div>
<div class="form-group">
<label for="FullName">Firstname</label>
<input type="text" value="John Doe" id="FullName" class="form-control">
</div>
<div class="form-group">
<label for="Email">Email</label>
<input type="email" value="first.last@example.com" id="Email" class="form-control">
</div>
<div class="form-group">
<label for="Email">Work Email</label>
<input type="email" value="first.last@example.com" id="Email" class="form-control">
</div>
<div class="form-group">
<label for="Username">Username</label>
<input type="text" value="john" id="Username" class="form-control">
</div>
<div class="form-group">
<label for="Password">Password</label>
<input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
</div>
<div class="form-group">
<label for="RePassword">Re-Password</label>
<input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
</div>
<div class="form-group">
<label for="AboutMe">About Me</label>
<textarea style="height: 125px;" id="AboutMe" class="form-control">some description here.</textarea>
</div>
<button class="btn btn-primary" type="submit">update</button>
</form>
</div>
</div>
</div>

</div> 
</div>
</div>
</div>
</div>
<!-- Page Content Ends -->
@endsection