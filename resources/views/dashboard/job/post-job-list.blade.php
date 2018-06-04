@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
   @include('dashboard.partials.dashboard-sidebar')

	 <div class="col-md-9">
     <div class="edit_profile padding_down_s">
       <h3 class="f_profile_content text-center">Post Job List</h3>
     </div>
     <div class="row">
       <div class="col-md-12">
         <table class="data_table_apply display" width="100%" data-page-length="10" class="table table-dark">
           <thead>
             <tr>
               <th>#</th>
               <th>Subject</th>
               <th>Title</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
             
             @foreach($jobs as $key => $value)
             <tr>
               <td>{{++$key}}</td>
               <td>{{$value->subject}}</td>
               <td>{{$value->title}}</td>
               <td><a class="btn btn-theme btn-sm btn-min-block f_viewjob" href="{{route('post-job-detail', ['id' => $value->id])}}">DETAIL</a></td>
             </tr>             
             @endforeach

           </tbody>
         </table>
       </div>
     </div>
     <div class="row f_mainborder s_mainborder">
       <div class="col-md-9">
         <h3 class="f_course">Accusamus et iusto odio dignissimos ducimus qui blanditiis</h3>
         <p class="f_findcontent">At vero eos et accusamus et iusto odio dignissimos ducimus qui At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga</p>
         <p class="f_posted s_posted">- Posted by Tony, 10 hours ago</p>
       </div>
       <div class="col-md-3">
         <div class="s_buttonview">
           <a class="btn btn-theme btn-sm btn-min-block f_viewjob" href="#">VIEW Detail</a>
         </div>
       </div>
     </div>
     <div class="row f_mainborder s_mainborder">
       <div class="col-md-9">
         <h3 class="f_course">Accusamus et iusto odio dignissimos ducimus qui blanditiis</h3>
         <p class="f_findcontent">At vero eos et accusamus et iusto odio dignissimos ducimus qui At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga</p>
         <p class="f_posted s_posted">- Posted by Tony, 10 hours ago</p>
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
