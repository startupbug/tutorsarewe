<footer>
   <section class="footer_main">
      <div class="container">
         <div class="row">
            <div class="col-md-2 col-sm-6 col-xs-6">
               <h3 class="f_get">GET TO KNOW US</h3>
               <ul f_list>
                  <li class="list-item">
                     <a href="{{route('aboutus')}}">About Us</a>
                  </li>
                  <li class="list-item">
                     <a href="{{route('signup')}}">Terms And Conditions</a>
                  </li>
                  <li class="list-item">
                     <a href="{{route('tutors_listing')}}">Search For A Tutor</a>
                  </li>
                  <li class="list-item">
                     <a href="#">Search For A Student</a>
                  </li>
                  <li class="list-item">
                     <a href="{{route('fulltime_tutor')}}">Become A Tutor</a>
                  </li>
               </ul>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-6">
               <h3 class="f_get">QUICK LINK</h3>
               <ul f_list>
                  <li class="list-item">
                     <a href="{{route('how_it_works')}}">How it Works</a>
                  </li>
                  <li class="list-item">
                     <a href="{{route('find_tutor')}}">Start Tutoring</a>
                  </li>
                  <li class="list-item">
                     <a href="{{route('publications')}}">Publications</a>
                  </li>
                  <li class="list-item">
                     <a href="#">Partners</a>
                  </li>
                  <li class="list-item">
                    <a href="{{route('contactus')}}">Contact Us</a>
                  </li>
               </ul>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
               <h3 class="f_get">FIND A TUTOR FAST.GET OUR APP.</h3>
               <p class="f_sed">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque<br>            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore </p>
               <form action="{{route('subscribe')}}" method="post" id="subscribe_1">
                {{csrf_field()}}
                  <div class="form-group">
                     <input type="email"  class="form-control f_form" name="email" id="usr_email_1" placeholder="Enter Email Address" required>
                  </div>
                  <div class="btn_check">
                     <button type="submit" name="submit" class="btn btn-default f_color button_tour">SEND A LINK</button>
                     <i class="fa fa-play f_play"></i><span class="f_icon1">Google Play</span>
                     <i class="fa fa-mobile f_play" aria-hidden="true"></i><span class="f_icon1">App Store</span>
                  </div>
               </form>
            </div>
         </div>
         <div class="row f_border">
            <div class="col-md-4 border_right">
               <h3 class="f_get1">LET'S KEEP IN TOUCH</h3>
               <div class="icons_social">
                  <i class="fa fa-facebook social_icon"></i>
                  <i class="fa fa-instagram social_icon"></i>
                  <i class="fa fa-youtube social_icon"></i>
                  <i class="fa fa-twitter social_icon"></i>
                  <i class="fa fa-pinterest-p social_icon"></i>
                  <i class="fa fa-google-plus social_icon"></i>
               </div>
            </div>
            <div class="col-md-4 border_right">
               <img src="{{ asset('public/assets/images/logo.png') }}" class="img-responsive log_f">
            </div>
            <div class="col-md-4 f_borderlast">
               <h3 class="f_get1">FEELING A LITTLE LOST?</h3>
               <p class="address"> 1-877-3- TUTORS 1877-388-8677</p>
            </div>
         </div>
         <div class="col-md-2 col-sm-6 col-xs-6">
            <h3 class="f_get">TUTORS BY SUBJECTS</h3>
            <ul class="f_list">
               <li class="list-item">
                  Algebra
               </li>
               <li class="list-item">
                  Homework
               </li>
               <li class="list-item">
                  Organization
               </li>
               <li class="list-item">
                  Projects
               </li>
               <li class="list-item">
                  Math
               </li>
               <li class="list-item">
                  Science Fair Help
               </li>
               <li class="list-item">
                  Calculus
               </li>
            </ul>
         </div>
         <div class="col-md-3 col-sm-6 col-xs-6">
            <!--<h3 class="f_get">TUTORS BY LOCATION</h3>-->
            <ul class="f_list f_list1">
               <li class="list-item">
                  Trigonometry
               </li>
               <li class="list-item">
                  Early Childhood Tutoring
               </li>
               <li class="list-item">
                  English
               </li>
               <li class="list-item">
                  French
               </li>
               <li class="list-item">
                  Social Studies
               </li>
               <li class="list-item">
                  Reading
               </li>
               <li class="list-item">
                  Full Time Tutoring
               </li>
            </ul>
         </div>
         <div class="col-md-3 col-sm-6 col-xs-6">
            <!--<h3 class="f_get">TUTORS BY LOCATION</h3>-->
            <ul class="f_list f_list1 f_borderright f_spanish">
               <li class="list-item padding_top">
                  Spanish
               </li>
               <li class="list-item">
                  Italian
               </li>
               <li class="list-item">
                  Arabic
               </li>
               <li class="list-item">
                  Swahili
               </li>
               <li class="list-item">
                  Yoruba
               </li>
               <li class="list-item">
                  Music
               </li>
               <li class="list-item">
                  Biology
               </li>
            </ul>
         </div>
         <div class="col-md-offset-1 col-md-3 col-sm-6 col-xs-6">
            <h3 class="f_get f_margin">TUTORS BY LOCATION</h3>
            <ul class="f_list">
               <li class="list-item">
                  Bon Air
               </li>
               <li class="list-item">
                  Woodstock
               </li>
               <li class="list-item">
                  Big Flat
               </li>
               <li class="list-item">
                  Emmet
               </li>
               <li class="list-item">
                  Banning
               </li>
               <li class="list-item">
                  Newman
               </li>
               <li class="list-item">
                  Fowler
               </li>
            </ul>
         </div>
      </div>
   </section>
   <section class="footer_last">
      <div class="container">
         <div class="row">
            <div class="col-md-6">
               <p class="footer_f">© 2018 TutorsAreUs. - All Rights Reserved</p>
            </div>
            <div class="col-md-6">
               <ul class="f_site">
                  <li><a href="testimonial.php">Testimonial</a></li>
                  <li><a href="blog.php">Blog</a></li>
                  <li><a href="faq.php">FAQ</a></li>
                  <!--<li>Sitemap</li>
                     <li>Terms of Use</li>
                     <li>Privacy Policy</li>-->
               </ul>
            </div>
         </div>
      </div>
   </section>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('public/assets/js/jquery-3.1.1.min.js') }}"></script>
<!-- UI Jquery -->
<script src="{{ asset('public/assets/js/jquery-ui.js') }}"></script>
<!-- UI Jquery -->
<script src="{{ asset('public/assets/js/bootstrap-slider.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Bootstrap -->
<script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
<!-- Carousel-min -->
<script src="{{ asset('public/assets/js/owl.carousel.min.js') }}"></script>
<!-- alertify-js -->
<script src="{{ asset('public/assets/js/alertify.min.js') }}"></script>
<!-- Animation AOS JS -->
<script src="{{ asset('public/assets/js/aos.js') }}"></script>
<!-- Animation JS -->
<script src="{{ asset('public/assets/js/script.js') }}"></script>
<!-- Custom-js -->
<script src="{{ asset('public/assets/js/custom.js') }}"></script>

<!-- Custom app -js -->
<script src="{{ asset('public/assets/js/custom-app.js') }}"></script>


<!-- Toaster Alert Files -->
<script src="{{ asset('public/admin/js/toastr.min.js') }}"></script>

</div>
<script type="text/javascript">
   $('#myDropdown').on('click', 'a', function(){
         console.log('asdasd');
        var value = $(this).text();
        var firstname = $(this).data('fname');
        var lastname = $(this).data('lname');

        $(this).closest('#myDropdown').siblings('.form-control').val(value);
        
        $(this).closest('#myDropdown').siblings('.fname').val(firstname);
        $(this).closest('#myDropdown').siblings('.lname').val(lastname);

        console.log($(this).closest('#myDropdown').siblings('.lname').val());

        document.getElementById("myDropdown").classList.toggle("show");

  });

$("#ref_butn").on('click', function(e){
   e.preventDefault(); 
   var url_string = window.location.href;
   var url = new URL(url_string);
   var c = url.searchParams.get("limit") ? url.searchParams.get("limit") : 10;
   if(!url.searchParams.get("limit")){
      url_string = url_string + "?limit=10";
   }
   var d = $("#ref_butn").attr('data-result');
   link = url_string.replace("limit="+c, "limit="+(parseInt(d)+10));
   link = link.replace("tutor-search", "tutor-search-ajax");
console.log(link);
   $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
   });
   $.ajax({
      type: "get",
      url: link,  
      beforeSend: function(){
         $("#ref_butn").attr('disabled','disabled');
      } ,
      success: function (data) {
       if(data.status == 200){
         $("#ref_butn").attr('data-result', parseInt(d)+10);
         $("#ref_butn").removeAttr('disabled');
         $("#results").append(data.data);

       }else if(data.status==202){
          alertify.warning(data.msg)
          $("#ref_butn").removeAttr('disabled');
       }
       else if(data.status==201){
         $("#results").append(data.data);
         $("#ref_butn").attr('disabled','disabled');
       }
    },
    error: function (data) {
      alertify.warning("Oops. something went wrong. Please try again");
      $("#ref_butn").removeAttr('disabled');
    }
    
   });
});


$(".mcqTestForm").on('submit', function(e){
        e.preventDefault();
        var thisScope = $(this);
        $(this).find('.button_mcqs').hide();
        var formData = $(this).serialize();
        console.log(formData);
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
        });
    
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: formData,
            success: function(data){
                //console.log(data);
                if(data.ans==1){
                 thisScope.find('[value="'+data.ans_text+'"]').closest('.border_mcqs').addClass('correct');
                  thisScope.find('.WyzQuizExplanation').show();
                  thisScope.find('.define_option').html(data.ans_text);
                  thisScope.find('.mcqs').addClass('mcqs_correct');
                }else if(data.ans==0){
                  thisScope.find('.WyzQuizExplanation').show();
                  thisScope.find('.define_option').html(data.ans_text);
                  thisScope.find('[value="'+data.wr_text+'"]').closest('.border_mcqs').addClass('incorrect');
                  thisScope.find('[value="'+data.wr_text+'"]').closest('.border_mcqs').find('.correct_answer').html("Your Answer");
                  thisScope.find('[value="'+data.ans_text+'"]').closest('.border_mcqs').addClass('correct');
                  thisScope.find('.mcqs').addClass('mcqs_incorrect');
                }
            },
            error: function(data){
                toastr.error("Something went wrong, Please Try again.");
            }
        });    
    });

</script>

<script type="text/javascript">
   $(document).ready(function() {
        $('select[name=country]').change(function() {
            var countryID = $(this).val();
            console.log(countryID);

            $.ajaxSetup({
               headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            });

            if(countryID) {
            $.ajax({
                url: $(this).data('url'),
                type: "POST",
                data: {'countryID': countryID},
                success:function(data) {
                     console.log(data);

                $('#cityDropdown').empty();
                var myDropdown = '';
                myDropdown += '<option value=""> Select City </option>';
                                
                $.each(data, function(key, value) {
                    myDropdown += '<option value="'+ value.id +'">'+ value.name +'</option>';   

                });
                
                $('#city').html(myDropdown);
                }
            });
            }else{
            $('#cityDropdown').empty();
              }
           });


        });
</script>
</body>
</html>