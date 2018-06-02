@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
   @include('dashboard.partials.dashboard-sidebar')
{{dd($all_jobs)}}
	 <div class="col-md-9">
     <div class="edit_profile padding_down_s">
       <h3 class="f_profile_content text-center">Post Job List</h3>
     </div>
     @foreach($all_jobs as $all_job)
      <div class="row f_mainborder s_mainborder">
        <div class="col-md-9">
         <h3 class="f_course">{{$all_job->title}}</h3>
         <p class="f_findcontent">{{$all_job->details}}</p>
         <h3 class="f_course">Subject : {{$all_job->sub_name}}</h3>
         <p class="f_posted s_posted"><b>Posted</b>, 10 hours ago</p>
        </div>
        <div class="col-md-3">
         <div class="s_buttonview">
           <a class="btn btn-theme btn-sm btn-min-block f_viewjob" href="{{route('post-job-detail',$all_job->id)}}">VIEW Detail</a>
         </div>
       </div>
     </div>
     @endforeach
	 </div>
</div>
@endsection
