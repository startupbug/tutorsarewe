@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Career Job
        <small>- Career Job detail</small>
      </h1>
    </section>

    <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                <!-- general form elements -->

                    <h1 class="box-title">{{$single_career_job->job_heading}}</h1>

                  <!-- /.box-header -->
                  <!-- form start -->
                  <h3>Job description</h3>
                  {!!$single_career_job->job_desc!!}
                    <br>

                    <h3>Job Specifications</h3>
                  {!!$single_career_job->job_spec!!}
                    <br>                    
   
                    <h3>Job Qualification</h3>
                  {!!$single_career_job->quaification!!}
                    <br>    

                    <h3>Job Perks</h3>
                  {!!$single_career_job->job_perks!!}
                    <br>

                    <h3>Job City</h3>
                  {{$single_career_job->job_city}}
                    <br>

                    <h3>Apply by</h3>
                  {!!$single_career_job->job_apply_date!!}
                    <br>                                       
              </div>
            </div>
        </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection