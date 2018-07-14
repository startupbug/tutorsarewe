@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Application Panel
        <small>- Application </small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
   <div class="row">

      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Application list</h3>
              @include('admin.partials.error_section')              
          </div>
          <!-- /.box-header -->
          
            <h1>Full Name</h1>  
            <p>{{$details->full_name}}</p>  
              <br>
            <h1>Gender</h1>  
            <p>{{$details->gender}}</p>  
              <br>   
            <h1>ID Number</h1>   
            <p>{{$details->id_num}}</p>  
              <br>
            <h1>Contact number</h1>  
            <p>{{$details->contact_num}}</p>  
              <br>
            <h1>Job Description</h1>  
            <p>{{$details->job_desc}}</p>  
              <br>
            <h1>Job City</h1>  
            <p>{{$details->job_city}}</p>  
              <br>
            <h1>Shift</h1>  
            <p>{{$details->shift}}</p>  
              <br>
            <h1>Source</h1>  
            <p>{{$details->source}}</p>  
              <br>
            <h1>Age</h1>  
            <p>{{$details->age}}</p>  
              <br>
            <h1>Education</h1>  
            <p>{{$details->education}}</p>  
              <br>   
            <h1>Language</h1>   
            <p>{{$details->language}}</p>  
              <br>
            <h1>Email Address</h1>  
            <p>{{$details->email_address}}</p>  
              <br>
            <h1>Location</h1>  
            <p>{{$details->location}}</p>  
              <br>
            <h1>Resume</h1><a href="{{route('get_resume',['id'=>$details->id])}}">Download</a>  
            <p>{{$details->resume}}</p>  
                                    
                 
         
                        
        
</div>
</div>
</section>
<!-- /.content -->
</div>
@endsection
