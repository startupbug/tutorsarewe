@extends('dashboard.dashboard-app')
@section('content')
<div class="container-fluid remove_padding bg_color_gray">
   @include('dashboard.partials.dashboard-sidebar')

	 <div class="col-md-9">
     <div class="edit_profile padding_down_s">
       <h3 class="job_detail_heading">Post Job Detail</h3>
     </div>
     <div class="row">
       <div class=" col-md-8" style="padding:  0  0 0 25px;">
         <h3 class="f_course">{{$single_job->title}}</h3>
         <p class="f_findcontent">{{$single_job->details}}</p>
         <h3 class="f_course">Subject : {{$single_job->subject}}</h3>
          <h3 class="f_course">Lesson Type : {{$single_job->subject}}</h3>
         <p class="f_posted s_posted"><b>Posted</b>, {{$single_job->created_at->diffForHumans()}}</p>
       </div>
     </div>

     <div class="tutor_heading">
       <h3 class="about_us">Tutor Responses</h3>
     </div>
     <div class="row f_mainborder s_bg_white">
       <div class="col-md-2">
          <img src="http://localhost/tutorsarewe/public/assets/images/search_img.png" class="img-responsive s_img_search">
       </div>
       <div class="col-md-7 border_search">
          <h3 class="search_name">Alex. S.</h3>
          <h3 class="f_course">Computer Programming, Karate, Music, and General Ed Tutor</h3>
          <p class="f_findcontent">As a professional Karate instructor for five years with a second degree black belt in Wado Karate, I have experience tutoring students of all ages, both in large groups and individually.</p>
          <a href="#myModal" class="f_detail" data-toggle="modal">Message</a>
       </div>
       <div class="col-md-3">
          <h3 class="search_name">$70/hour</h3>
          <ul class="search_list">
             <li><i class="fa fa-star f_star"></i></li>
             <li><i class="fa fa-star f_star"></i></li>
             <li><i class="fa fa-star f_star"></i></li>
             <li><i class="fa fa-star f_star"></i></li>
             <li><i class="fa fa-star f_star"></i></li>
             <li>
                <h3 class="search_name f_iphone">5.0(367)</h3>
             </li>
          </ul>
          <ul class="search_list">
             <li><i class="fa fa-clock-o f_clock"></i></li>
             <li>
                <h3 class="search_name ">1,722 <span>hours tutoring</span></h3>
             </li>
          </ul>
       </div>
     </div>
	 </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title s-modal-header">Welcome to Message</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          {{csrf_field()}}
          <div class="form-group profile_form s_profile_form">
            <label>Message <span>*</span></label>
            <br>
            <textarea name="description" rows="8" cols="80" class="form-control span3" required></textarea>
          </div>
          <div class="form-group">
           <input type="submit" value="Send Message" class="btn s_save">
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
@endsection
