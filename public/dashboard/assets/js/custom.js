$( function() {

  $( "#slider" ).slider();

	// With JQuery
	$("#ex2").slider({});
console.log("ASdasd");
	// Without JQuery
	// var slider = new Slider('#ex2', {});

  $('.offline').on('change', function() {
      if ($(this).is(":checked")) {
        $('.form_address').removeClass('hidden');
        $('.job_address').attr('disabled', false);
      }else {
        $('.form_address').addClass('hidden');
        $('.job_address').attr('disabled', true);
      }
  });

});


$(".f_tab").click(function(){
  $(".f_tab").removeClass("active-tab");
  $(this).addClass("active-tab");
})
var myIndex = 0;
var slideIndex = 1;
carousel();
function plusDivs(n) {
  showDivs(slideIndex += n);
}
function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       // x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    // x[myIndex-1].style.display = "block";
    setTimeout(carousel, 3000); // Change image every 2 seconds
}

$(document).ready(function(){
  $(".sendReqMsg").on('click', function(e){
      console.log("data id" + $(this).data('id'));
      $("#job_id").val($(this).data('id'));

      console.log($(this).data('tutor'));
      $("#reply_tutor_id").val( $(this).data('tutor') );
  });

  $("#replyTutorForm").on('submit', function(e){
      e.preventDefault();

        console.log("reply form");
        var formData = new FormData(this);
        console.log(formData);

        $.ajaxSetup({
          headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
        });

        $.ajax({
          type: "POST",
          url: $(this).attr('action'),
          data: formData,
          processData: false,
          contentType: false,
          success: function(data){

            if(data.success == true){
              toastr.success(data.msg);

              $("#myModal").modal('toggle');

              // setTimeout(function(){
              //   location.reload();
              // }, 600);

            }else if(data.success == false){
              toastr.success(data.msg);
            }
          },
          error: function(data){
            toastr.error(data.msg);
          }
        });
  });

});
