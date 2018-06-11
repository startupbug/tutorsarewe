@extends('app')
@section('content')
<section class="profile_main">
   <div class="container">
       @include('partials.error_section')
      <div class="row">
         <div class="col-md-8">
            <div class="col-md-3">
               @if(isset($tutor_info->profile->profile_pic))
               <img src="{{ asset('public/dashboard/assets/images/profile/' . $tutor_info->profile->profile_pic ) }}" class="img-responsive">
               @else
               <img src="{{ asset('public/dashboard/assets/images/profile/default.jpg') }}" class="img-responsive">
               @endif
            </div>
            <div class="col-md-9">
               <div class="profile_content">
                  <h3>
                     @if(isset($tutor_info->first_name))
                        {{ $tutor_info->first_name }}
                     @endif 
                     @if(isset($tutor_info->first_name))
                        {{ $tutor_info->last_name }}
                     @endif
                  </h3>
                  @if($tutor_info->role_id == 3)
                     <h1 class="f_hello">$ Hourly rate:$
                        @if(isset($tutor_info->profile->tution_per_hour))
                           {{$tutor_info->profile->tution_per_hour}}
                        @endif
                     </h1>
                     <i class="fa fa-star f_icon_color"></i>
                     <i class="fa fa-star f_icon_color"></i>
                     <i class="fa fa-star f_icon_color"></i>
                     <i class="fa fa-star f_icon_color"></i>
                     <i class="fa fa-star f_icon_color"></i><span>
                        @if(isset($tutor_info->profile->rating))
                           {{ $tutor_info->profile->rating }}
                        @endif
                     (449 Ratings)</span>
                     <h2>2469 hours tutoring</h2>
                  @endif
               </div>
            </div>
            <div class="col-md-12">
               <h3 class="about_main_head">About 
                  @if(isset($tutor_info->first_name))
                     {{ $tutor_info->first_name }}
                  @endif
               </h3>
               <hr>
            </div>
            <div class="col-md-12 border_bottom_profile">
               <div class="col-md-3">
                  <h3 class="f_bio">Bio</h3>
               </div>
               <div class="col-md-9">
                  <h3 class="f_hello">
                     @if(isset($tutor_info->profile->bio))
                     {{ $tutor_info->profile->bio }}
                     @endif
                  </h3>
                  <!-- <a href="#" class="f_read">Read more</a> -->
               </div>
               <div class="clearfix"></div>
               <hr>
            </div>
            <div class="">
               <div class="col-md-3">
                  <h3 class="f_bio">Education</h3>
               </div>
               <div class="col-md-9">
                  
                  <h3 class="f_hello">
                     @if(isset($tutor_info->profile->qualification_from))
                        {{$tutor_info->profile->qualification_from}}
                     @endif
                  </h3>
                  <h3 class="f_hello">
                     @if(isset($tutor_info->profile->qualifications))
                        {{$tutor_info->profile->qualifications}}
                     @endif
                  </h3>
               </div>
               <div class="clearfix"></div>
               <hr>
            </div>
            @if($tutor_info->role_id == 3)
            <div class="">
               <div class="col-md-3">
                  <h3 class="f_bio">Schedule</h3>
               </div>
               <div class="col-md-9">
                  <h3 class="f_hello">SunMidnight - 1:00 am, 4:00 am - 7:00 am, 8:00 pm - Midnight</h3>
                  <h3 class="f_hello">MonMidnight - 5:00 am, 11:00 pm - Midnight</h3>
                  <h3 class="f_hello">TueMidnight - 1:00 am, 4:00 am - 7:00 am, 8:00 pm - 11:00 pm</h3>
                  <h3 class="f_hello">Wed3:00 am - 7:00 am, 8:00 pm - Midnight</h3>
                  <h3 class="f_hello">ThuMidnight - 1:00 am, 3:00 am - 7:00 am, 11:00 pm - Midnight</h3>
                  <h3 class="f_hello">FriMidnight - 1:00 am, 6:00 am - 7:00 am, 8:00 pm - Midnight</h3>
               </div>
               <div class="clearfix"></div>
               <hr>
            </div>            
            <div class="">
               <div class="col-md-3">
                  <h3 class="f_bio">Subjects</h3>
               </div>
               <div class="col-md-5">
                  @foreach($tutor_subjects as $subject)
                  <h3 class="f_bio">{{$subject->subject->subject}}</h3>
                  @endforeach
               </div>
               <!-- div class="col-md-4">
                  <h3 class="f_bio">Homeschool</h3>
                  <h3 class="f_subject">Algebra 1,  Algebra 2,  Geometry, Prealgebra,  Precalculus,  Calculus</h3>
                  <br>
                  <h3 class="f_bio">Math</h3>
                  <h3 class="f_subject">ACT Math,  Algebra 1,  Algebra 2, Geometry,  Prealgebra, Precalculus,  Trigonometry, Calculus</h3>
                  <br>
                  <h3 class="f_bio">Most popular</h3>
                  <h3 class="f_subject">Algebra 1,  Algebra 2,  Geometry, Prealgebra,  Precalculus,  Calculus</h3>
                  <br>
                  <h3 class="f_bio">Summer</h3>
                  <h3 class="f_subject">Algebra 1,  Algebra 2,  Geometry, Calculus</h3>
                  <br>
                  <h3 class="f_bio">Test Preparation</h3>
                  <h3 class="f_subject">ACT Math</h3>
               </div> -->
               <div class="clearfix"></div>
               <hr>
            </div>         
            <h3 class="about_main_head">Ratings and Reviews</h3>
            <hr>
            <div class="">
               <div class="col-md-3">
                  <h3 class="f_bio">Rating</h3>
               </div>
               <div class="col-md-9">
                  <div class="profile_content">
                     <i class="fa fa-star f_icon_color"></i>
                     <i class="fa fa-star f_icon_color"></i>
                     <i class="fa fa-star f_icon_color"></i>
                     <i class="fa fa-star f_icon_color"></i>
                     <i class="fa fa-star f_icon_color"></i><span>5.0(449 Ratings)</span>
                  </div>
                  <div class="row">
                     <div class="side">
                        <p>5 star</p>
                     </div>
                     <div class="middle">
                        <div class="bar-container">
                           <div class="bar-5"></div>
                        </div>
                     </div>
                     <div class="side right">
                        <p>(436)</p>
                     </div>
                     <div class="side">
                        <p>4 star</p>
                     </div>
                     <div class="middle">
                        <div class="bar-container">
                           <div class="bar-4"></div>
                        </div>
                     </div>
                     <div class="side right">
                        <p>(13)</p>
                     </div>
                     <div class="side">
                        <p>3 star</p>
                     </div>
                     <div class="middle">
                        <div class="bar-container">
                           <div class="bar-3"></div>
                        </div>
                     </div>
                     <div class="side right">
                        <p>(0)</p>
                     </div>
                     <div class="side">
                        <p>2 star</p>
                     </div>
                     <div class="middle">
                        <div class="bar-container">
                           <div class="bar-2"></div>
                        </div>
                     </div>
                     <div class="side right">
                        <p>(0)</p>
                     </div>
                     <div class="side">
                        <p>1 star</p>
                     </div>
                     <div class="middle">
                        <div class="bar-container">
                           <div class="bar-1"></div>
                        </div>
                     </div>
                     <div class="side right">
                        <p>(0)</p>
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
               <hr>
            </div>
            <div class="">
               <div class="col-md-3">
                  <h3 class="f_bio">Reviews</h3>
               </div>
               <div class="col-md-9">
                  <h3 class="f_bio">Featured review</h3>
                  <h3 class="f_awe">Awesome</h3>
                  <h3 class="f_hello">After trying many math tutors, we finally hit the jackpot! After one lesson with Priti my daughter said this is the first time she really feels like she understands math. We are setting up a weekly appointment. Also note, my daughter is hard to impress.</h3>
                  <h3 class="f_hello">- Benita, 24 lessons with Priti</h3>
                  <hr>
                  <h3 class="f_hello">Knowledgeable and effective tutor</h3>
                  <h3 class="f_hello">She was very prepared and helped my child understand trigonometric concepts in new ways. She explained things very well, and she was also patient, friendly, and prompt.</h3>
                  <h3 class="f_hello">-Jennifer, 1 lesson with Priti</h3>
                  <hr>
                  <h3 class="f_hello">Very knowledgeable </h3>
                  <h3 class="f_hello">She really helped my son understand his Geometry which has been a struggle for him. He is definitely looking forward to his next session with her. Highly recommend!</h3>
                  <h3 class="f_hello">-Lisa, 4 lessons with Priti</h3>
                  <hr>
               </div>
               <div class="clearfix"></div>
            </div>
            @endif
         </div>
         <div class="col-md-4">
            <div class="menu">
               <header class="menu__header">
                  <h1 class="menu__header-title">$65/hour</h1>
               </header>
               <div class="menu__body">
                   <ul class="nav">
                    <li class="nav__item">
                       <a href="#" class="nav__item-link">
                       <span class="nav__item-text"><img src="{{asset('public/assets/images/profile_img1.jpg')}}">No subscriptions or upfront
                       payments</span>
                       </a>   
                    </li>
                    <li class="nav__item">
                       <a href="#" class="nav__item-link">
                       <span class="nav__item-text"><img src="{{asset('public/assets/images/profile_img2.jpg')}}">Only pay for the time you
                       need</span>
                       </a>   
                    </li>
                    <li class="nav__item">
                       <a href="#" class="nav__item-link">
                       <span class="nav__item-text"><img src="{{asset('public/assets/images/profile_img3.jpg')}}">Find the right fit, or your first
                       hour is free</span>
                       </a>   
                    </li>
                 </ul>
               </div>
            </div>
            @if(Auth::check())
            <div class="btn_bottom">            
               <a href="#" class="f_contact_priti"  data-toggle="modal" data-target="#jobRequestModal">Contact 
                  @if(isset($tutor_info->first_name))
                  {{$tutor_info->first_name}}
                  @endif
               </a>
            </div>
            @else
            <div class="btn_bottom">            
               <a href="{{route('signin')}}" class="f_contact_priti">Login To Contact</a>
            </div>
            @endif
            <p class="f_res">Response time: 46 minutes</p>
         </div>
         @if($tutor_info->role_id == 3)
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h3 class="f-other">Other Tutors Similiar To This Profile</h3>
                  <p class="f_palatine">
                  @foreach($recommended_users as $value)
                     {{$value->first_name}} {{$value->last_name}},
                  @endforeach
                  </p>
               </div>
            </div>
         </div>
         @endif
      </div>
   </div>
</section>
<div class="modal fade" id="jobRequestModal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
             <div class="modal-header">
                 <button type="button" class="close" 
                    data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                 </button>
                 <h4 class="modal-title" id="myModalLabel">
                     <span class="subjModalHeading"></span> Contact Message
                 </h4>
             </div>            
            <form role="form" id="" action="{{route('contact_tutor_email')}}" method="post">
               {{csrf_field()}}
               <input type="hidden" name="tutor_name" value="{{$tutor_info->first_name}} {{$tutor_info->last_name}}">
               <input type="hidden" name="tutor_email" value="{{$tutor_info->email}}">
                <!-- Modal Body -->
                <div class="modal-body">
                      <div class="form-group">
                        <label for="task">Message Description</label>
                          <textarea class="form-control" name="description" required=""></textarea>
                      </div>           
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                                Close
                    </button>
                    <button type="submit" name="submit" class="btn btn-primary">
                        <span class="subjModalHeading"></span> Send Email
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection