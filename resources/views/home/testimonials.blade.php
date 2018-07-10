@extends('app')
@section('content')
<section class="testimonial">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h3 class="f_tutor">What are client says about us</h3>
            <div class="time_click f_test">
               <a href="#jobRequestModal"  data-toggle="modal">WRITE A REVIEW</a>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="border_testimonial">
               <i class="fa fa-quote-left f_iconcomma"></i>
               <h3 class="f_joy">Joy</h3>
               <p class="content_testimonial">I am very thankful for meeting Available tutors. They have been working with my child since 3rd grade. Now he is in 8th Grade. He <br>went from being a struggling student to Principal’s Honor Roll. He now takes Honor’s classes. Not only academically, they also <br>provided mentoring for my child. He is self motivated. I strongly recommend this company.</p>
               <p class="right_f">Joy, New Carrollton, MD</p>
            </div>
         </div>
         <div class="col-md-12">
            <div class="border_testimonial">
               <i class="fa fa-quote-left f_iconcomma"></i>
               <h3 class="f_joy">Faye</h3>
               <p class="content_testimonial">Available Tutors helped my child. I wanted my child to read really fast and I enrolled for 1 hour daily. In 3 months my child was <br>reading 3rd grade level in Kindergarten. The teacher called me to find out how it happened, from my son just being able to sound <br>out words in September to 3rd grade level reading in December. I strongly recommend them. I did not stop there, I immediately <br>enrolled my daughter too and same thing happen, she was reading second grade level in 1st Quarter kindergarten. I am really 
                  <br>impressed. I strongly recommend them.
               </p>
               <p class="right_f">Faye, Bowie, MD</p>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Subject Edit Modal -->
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
                        <span class="subjModalHeading"></span> Testimonial
                    </h4>
                </div>
            
                <!-- Modal Body -->
                <div class="modal-body">
                    <form role="form" id="sendRequest" action="{{route('write_testimonial')}}" method="post">
                     {{csrf_field()}}
                      <div class="form-group">
                        <label for="task">Comment</label>
                          <textarea class="form-control" name="comment" rows="4" required></textarea>
                      </div>           
                </div>
            
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn f_viewjob ">
                        <span class="subjModalHeading"></span> Submit
                    </button>
                </div>
             </form>
        </div>
    </div>
</div>
@endsection
