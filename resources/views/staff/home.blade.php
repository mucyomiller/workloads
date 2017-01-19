@extends('dashboard.theme')
@section('content')
<!-- Content -->
<!-- Page Content Start -->
<div class="wraper container-fluid">
<div class="page-title"> 
    <h3 class="title">Subjects</h3> 
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-color panel-info">
            <div class="panel-heading"> 
                <h3 class="panel-title"><i class="ion-home"></i><i class="pull-right">Workload Table</i></h3> 
            </div> 
            <div class="panel-body">
             @if(isset($courses) && count($courses)) 
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Course Credit</th>
                    <th>Hours</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($courses as $course)
                  <tr>
                    <td>{{$course->id}}</td>
                    <td>{{$course->course_code}}</td>
                    <td>{{$course->course_name}}</td>
                    <td>{{$course->course_credit}}</td>
                    <td>{{ $course->course_credit*10 }}</td>
                    <td>
                    <div class="btn btn-success">
                    <a style="color:white;" href="course?edit=code&rowId={{ $course->course_code }}">
                    <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    </div>
                    </td>
                    <td>
                    <div class="btn btn-danger">
                    <a style="color:white;" href="course?remobe=code&courseCode=
                    "{{ $course->course_code }}">
                    <i class="ion-trash"></i>
                    </a>
                    </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              <hr>
             <input type="button"  name="total" value="Total  : #&nbsp;" class="btn btn-warning">
             <a href="#" class="btn btn-success btn-sm pull-right" ><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;save</a>
            @else
            <p>You have no course add  to your table</p>
            @endif
            </div> 
        </div>
    </div>
</div> <!-- End row -->
</div> <!-- END Wraper -->
<!-- end of content -->
@endsection