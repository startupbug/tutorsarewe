@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
   @include('dashboard.partials.dashboard-sidebar')

	 <div class="col-md-9">
     <div class="edit_profile padding_down_s">
       <h3 class="f_profile_content text-center">Post Job List</h3>
     </div>

     <div class="row f_mainborder s_mainborder">
       <div class="col-md-9">
         <h3 class="f_course">Accusamus et iusto odio dignissimos ducimus qui blanditiis</h3>
         <p class="f_findcontent">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga</p>
         <h3 class="f_course">Subject : English</h3>
         <p class="f_posted s_posted">- Posted , 10 hours ago</p>
       </div>
       <div class="col-md-3">
         <div class="s_buttonview">
           <a class="btn btn-theme btn-sm btn-min-block f_viewjob" href="#">VIEW Detail</a>
         </div>
       </div>
     </div>
     
	 </div>
</div>
@endsection
